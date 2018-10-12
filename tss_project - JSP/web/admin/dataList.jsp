<%-- 
    Document   : result
    Created on : 2018-05-26, 10:13:55
    Author     : Panda
--%>

<%@page import="java.util.ArrayList"%>
<%@page import="entities.TDane"%>
<%@page import="DAO.DaneDAO"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <div style=" width: 30%; margin: 0 auto; text-align: center">
        <h1>Lista z bazy danych</h1>
            <div style=" width: 50%; margin: 0 auto;">
                <%
                    TDane data = (TDane)request.getAttribute("dane");
                    String nr = null;
                    String tytul = null;
                    String opis = null;          
                    long id = -1;

                    if(data != null){
                        nr = data.getNr();
                        tytul = data.getTytul();
                        opis = data.getOpis();
                        id = data.getId();
                    }
                %>
                
                <form action="DataControlerServlet" method="POST">
                    <input name="id" value="<%=id%>" type="hidden"/>
                    <input name="nr" placeholder="numer" value="<%=nr%>"/>
                    <br/>
                    <input name="tytul" placeholder="tytul" value="<%=tytul%>"/>
                    <br/>
                    <input name="opis" placeholder="opis" value="<%=opis%>"/>
                    <br/>
                    <button type="submit" name="action" value="create">Dodaj rekord</button>
                    <button type="submit" name="action" value="update">Zapisz edycje</button>
                </form>
            </div>
        <table style="border: 1px solid black; border-collapse: collapse; width: 100%; text-align: center">
                <thead>
                    <tr style="border: 1px solid black;">
                        <th style="border: 1px solid black; background-color: #6e6eff; color: white;">Numer</th>
                        <th style="border: 1px solid black; background-color: #6e6eff; color: white;">Tytuł</th>
                        <th style="border: 1px solid black; background-color: #6e6eff; color: white;">Opis</th>
                        <th style="border: 1px solid black; background-color: #6e6eff; color: white;">Usuń</th>
                        <th style="border: 1px solid black; background-color: #6e6eff; color: white;">Edytuj</th>                        
                    </tr>
                    <%
                        ArrayList<TDane> datas = (ArrayList<TDane>)request.getAttribute("datas");
                                                                     
                        
                        for(int i=0; i<datas.size(); i++){
                           data = datas.get(i);
                           %>
                           
                           <tr>
                           <td style="border: 1px solid black;"><%= data.getNr()%></td>
                           <td style="border: 1px solid black;"><%= data.getTytul()%></td>
                           <td style="border: 1px solid black;"><%= data.getOpis()%></td>
                           <td style="border: 1px solid black;"><a href="DataControlerServlet?action=delete&id=<%=data.getId()%>">Usuń</a></td>
                           <td style="border: 1px solid black;"><a href="DataControlerServlet?action=select&id=<%=data.getId()%>">Edytuj</a></td>
                           </tr>
                           <%
                        }
                    %>
                </thead>
        </table>
    </div>
    </body>
</html>
