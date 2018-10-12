<%-- 
    Document   : index
    Created on : 2018-04-10, 22:15:07
    Author     : Panda
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
    <div style="width:800px; margin:0 auto;">
        <form method="POST" action="j_security_check">
            <input type="text" name="j_username" placeholder="username">
            <br/>
            <input type="password" name="j_password" placeholder="password">
            <br/>
            <input type="submit" value="Logowanie">
        </form>
    </div>
    </body>
</html>
