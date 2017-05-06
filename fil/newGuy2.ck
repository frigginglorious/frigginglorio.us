0 => int device;

// feedforward
adc => Gain g => dac;


// feedback
g => Gain feedback => DelayL delay => g;

Gain g2;
g2 => Gain feedback2 => DelayL delay2 => g2;

1::second => delay2.max;

// 5::second => delay.max;

int base;
float a0;
float a1;
float a2;
int count;

// set delay parameters
//.75::second => delay.max => delay.delay;

// set feedback
//.5 => feedback.gain;

// set effects mix
//.75 => delay.gain;

// hid objects
Hid hi;
HidMsg msg;

// try
if( !hi.openJoystick( device ) ) me.exit();
<<< "joystick '" + hi.name() + "' ready...", "" >>>;
while( true )
{
    // wait on event
    hi => now;
    // loop over messages
    while( hi.recv( msg ) )
    {
        if( msg.isAxisMotion() )
        {
            if( msg.which == 0 ) msg.axisPosition => a0;
            else if( msg.which == 1 ) msg.axisPosition => a1;
            else if( msg.which == 2 ) msg.axisPosition => a2;
            set( base, a0, a1, a2 );
        }
         else if( msg.isButtonDown() )
        {
            if (count == 0){
                adc => Gain g => dac;
    // feedback
    //g2 => Gain feedback2 => DelayL delay2 => g2;
                1::second => delay.delay;
                1 => delay.gain;
                1 => feedback.gain;
                1 => count;
                <<< "loop On", "" >>>;
            }
            else if(count == 1){
                adc =< Gain g =< dac;
                <<< "Loop Done", "" >>>;
                2 => count;
            }
            else{

                0::second => delay.delay;
                0 => delay.gain;
                0 => feedback.gain;
                0 => count;
                <<< "Loop Off", "" >>>;
            }
        }

        else if( msg.isButtonUp() )
        {
    
        }

        
    }
}
fun void set( int base, float v0, float v1, float v2 )
{
    //0 => delay.gain;
    // modulator frequency
    //( 500 + 5*base + ( 500 * v0) ) => m.freq;
    //v0 => feedback.gain;
    // carrier frequency
    //( 220 + (220 * v2) ) => c.freq;
    
    // index of modulation
    //( 1000 * (v1+1) ) => m.gain;
    
    //<<< "carrier:", c.freq(), "modulator:", m.freq(), "index:", m.gain() >>>;
    //1::second => delay.max => delay.delay;
    // set feedback
    //1 => feedback.gain;

// set effects mix
    //1 => delay.gain;
}