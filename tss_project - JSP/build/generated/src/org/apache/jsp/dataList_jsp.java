package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import java.util.ArrayList;
import entities.TDane;
import DAO.DaneDAO;

public final class dataList_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final JspFactory _jspxFactory = JspFactory.getDefaultFactory();

  private static java.util.List<String> _jspx_dependants;

  private org.glassfish.jsp.api.ResourceInjector _jspx_resourceInjector;

  public java.util.List<String> getDependants() {
    return _jspx_dependants;
  }

  public void _jspService(HttpServletRequest request, HttpServletResponse response)
        throws java.io.IOException, ServletException {

    PageContext pageContext = null;
    HttpSession session = null;
    ServletContext application = null;
    ServletConfig config = null;
    JspWriter out = null;
    Object page = this;
    JspWriter _jspx_out = null;
    PageContext _jspx_page_context = null;

    try {
      response.setContentType("text/html;charset=UTF-8");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;
      _jspx_resourceInjector = (org.glassfish.jsp.api.ResourceInjector) application.getAttribute("com.sun.appserv.jsp.resource.injector");

      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("<!DOCTYPE html>\n");
      out.write("<html>\n");
      out.write("    <head>\n");
      out.write("        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n");
      out.write("        <title>JSP Page</title>\n");
      out.write("    </head>\n");
      out.write("    <body style=\"display: inline-block;margin: 0px auto;text-align: center;\">\n");
      out.write("        <h1>Lista z bazy danych</h1>\n");
      out.write("        \n");
      out.write("        <form action=\"DataControlerServlet\" method=\"POST\">\n");
      out.write("            <input name=\"nr\" placeholder=\"numer\"/>\n");
      out.write("            <br/>\n");
      out.write("            <input name=\"tytul\" placeholder=\"tytul\"/>\n");
      out.write("            <br/>\n");
      out.write("            <input name=\"opis\" placeholder=\"opis\"/>\n");
      out.write("            <br/>\n");
      out.write("            <button type=\"submit\">Dodaj rekord</button>\n");
      out.write("        </form>\n");
      out.write("        <table>\n");
      out.write("            <thead>\n");
      out.write("            \n");
      out.write("                ");

                    ArrayList<TDane> datas = (ArrayList<TDane>)request.getAttribute("datas");
                    for(int i=0; i<datas.size(); i++){
                       TDane data = datas.get(i);
                       
      out.write("\n");
      out.write("                       <tr>\n");
      out.write("                       <td>");
      out.print( data.getNr());
      out.write("</td>\n");
      out.write("                       <td>");
      out.print( data.getTytul());
      out.write("</td>\n");
      out.write("                       <td>");
      out.print( data.getOpis());
      out.write("</td>\n");
      out.write("                       <td><a href=\"DataControlerServlet?action=delete&id=");
      out.print(data.getId());
      out.write("\">Usuń</a></td>\n");
      out.write("                        </tr>\n");
      out.write("                       ");

                    }
                
      out.write("\n");
      out.write("           \n");
      out.write("            </thead>\n");
      out.write("    </table>\n");
      out.write("    </body>\n");
      out.write("</html>\n");
    } catch (Throwable t) {
      if (!(t instanceof SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          out.clearBuffer();
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
