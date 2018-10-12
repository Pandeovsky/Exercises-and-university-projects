/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlets;

import DAO.DaneDAO;
import appClasses.AppLogic;
import entities.TDane;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Panda
 */
@WebServlet(name = "DataControlerServlet", urlPatterns = {"/DataControlerServlet"})
public class DataControlerServlet extends HttpServlet {
  
    public DataControlerServlet(){
        super();
    }
    
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        DaneDAO ddao = DaneDAO.getInstance();        
        
        String action = request.getParameter("action");
        String idStr = request.getParameter("id");
        TDane dane = null;
        
        AppLogic appLogic = new AppLogic();
        dane = appLogic.deleteSelect(action, idStr);
        
        request.setAttribute("dane", dane);
        
        ArrayList<TDane> datas = ddao.findAllDane();
        request.setAttribute("datas", datas);
         
        String nextJSP = "/admin/dataList.jsp";
        RequestDispatcher dispatcher = getServletContext().getRequestDispatcher(nextJSP);
        dispatcher.forward(request, response);   
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
       
        AppLogic appLogic = new AppLogic();
        
        String nr = request.getParameter("nr");
        String tytul = request.getParameter("tytul");
        String opis = request.getParameter("opis");
        String idStr = request.getParameter("id");
        String action = request.getParameter("action");
        
        appLogic.createUpdate(nr,tytul,opis,idStr,action);
 
        doGet(request, response);
    }
    
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
