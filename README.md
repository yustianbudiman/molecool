# molecool
1. download or clone
2. copy "ex. c\:xampp\htdocs\molecool
3. open cmd, and go to directory
4. execute script php -S localhost:8000 -t ./public


test api with postman
1. open postman 
2. in database already exist user(admin@gmail.com )
3. http://localhost:8000/news/save_news
4. in tabs headers selct Authorization with value "barrier VUUwckJyRGhjaURpZWE5YXFiYlZ0djBSMG8wS0JFeHdTVEhLZGV6dg=="
5. in tabs body input content dan image 
note: user admin@gmail.com can create, read, update, delete

test api with postman
1. open postman 
2. in database already exist user(user@gmail.com)
3. http://localhost:8000/news/save_news
4. in tabs headers selct Authorization with value "barrier TlI4R1dJb0hEN2NWRTdxRHpOTU5LUFZFb0l2QnZVazRWa0hrVGJWTw=="
5. in tabs body input content dan image 
note: user user@gmail.com can create 

paging
http://localhost:8000/news/show_all/0/10
