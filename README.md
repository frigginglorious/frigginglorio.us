# frigginglorio.us
A CMS Portfolio/blog CMS 

http://frigginglorio.us

Rebuilding my personal website, which is mostly vanilla PHP, and documenting the process!

Now featuring a landing page inspired by 8-bit games, hand-built in React! This landing page allows the blog posts that you choose to "feature", and displays them with a picture and a synopsis with the icon that represents the category of the post!

### TODO:
1. ~~First and foremost: security. Hash DB passwords, parameterize queries (I made a DB backup before putting this on github)~~
2. flesh out CMS with options to ~~edit~~/delete posts
3. clean up filestructure
4. add ~~CRU~~D for CMS categories
5. Figure out how to handle deleting for categories. Don't want to orphan posts in DB. Should I just innactivate them, or delete entirely from DB? Are they visible from the admin panel at all?
5. Add "Featured Content" DB table that references post IDs and has fields for "technology stats"... which might be it's own reference table, color... and... you can add a short description of the project.
5. ~~Add some cool stuff with REACT~~
6. Selenium testing with python
    1. spider link hrefs on home page
    2. add unique links to array.
    3. visit links.
    4. add only add new links to array if on page from $_SERVER["SERVER_NAME"].
    5. output originating page URI, href, and return of bad links.
6. Add decent content!
7. Modularizing all static content to confic file (Site name and social media links/icons)