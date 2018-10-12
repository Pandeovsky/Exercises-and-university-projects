/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package appClasses;


import DAO.DaneDAO;
import entities.TDane;
import java.math.BigDecimal;
import javax.faces.bean.ViewScoped;
import javax.inject.Inject;

/**
 *
 * @author Panda
 */
@ViewScoped
public class AppLogic {

    @Inject
    DaneDAO danedao;

    public void createUpdate(String nr,String tytul,String opis,String idStr,String action){
        
     DaneDAO ddao = DaneDAO.getInstance();
                
       //TODO: Przenieść do osobnej klasy logiki aplikacji
        TDane dane = null;
        long idToCreate = ddao.getMaxID();
        if("update".equals(action)){
            if(idStr != null){
                long id = Long.parseLong(idStr);
                dane = new TDane((long)-1, nr, tytul, opis);
                ddao.updateDane(id, dane);
            }
        }else{
            
            dane = new TDane(idToCreate, nr, tytul, opis);
            ddao.createDane(dane);
        }
    }
    
    public TDane deleteSelect(String action, String idStr){
        
        DaneDAO ddao = DaneDAO.getInstance();
        
        TDane dane = null;
    //TODO: Przenieść do osobnej klasy logiki aplikacji        
        if("delete".equals(action)){
            if(idStr != null){
                int id = Integer.parseInt(idStr);
                ddao.deleteDane(id);
            }
        }else if("select".equals(action)){
            if(idStr != null){
                int id = Integer.parseInt(idStr);
                dane = ddao.findByID(id);
                
            }
        }
        return dane;
    }
}
