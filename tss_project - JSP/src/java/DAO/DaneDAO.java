/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAO;

import entities.TDane;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import com.microsoft.sqlserver.jdbc.SQLServerDriver;
import java.math.BigDecimal;

/**
 *
 * @author Panda
 */
public class DaneDAO {
    
    private static String FIND_ALL_DATA = "SELECT * FROM t_dane";
    private static String CREATE_DATA = "INSERT INTO t_dane (id, nr, tytul, opis) VALUES(?,?,?,?)";
    private static String DELETE_DATA = "DELETE FROM t_dane WHERE id=?";
    private static String FIND_BY_ID = "SELECT * FROM t_dane WHERE id=?";
    private static String UPDATE_DATA = "UPDATE t_dane SET nr=?, tytul=?, opis=? WHERE id=?";
    private static String MAX_ID = "SELECT MAX(id)+1 as maxID FROM t_dane";        
    
    private static String DRIVER = "com.microsoft.sqlserver.jdbc.SQLServerDriver";
    private static String DB_URL = "jdbc:sqlserver://155.158.112.31:1433;databaseName=tomcat";
    private static String USERNAME = "tomcatuser";
    private static String PASSWORD = "tomcat";
    
    private Connection connection = null;
    private PreparedStatement statement = null;
    private ResultSet resultSet = null;
    
    public ArrayList<TDane> findAllDane(){
        ArrayList<TDane> dane = new ArrayList<TDane>();
        try {
            Class.forName(DRIVER);
            connection = DriverManager.getConnection(DB_URL, USERNAME, PASSWORD);
            statement = connection.prepareStatement(FIND_ALL_DATA);
            resultSet = statement.executeQuery();
            while(resultSet.next()){
                long id = resultSet.getInt("id");
                String nr = resultSet.getString("nr");
                String tytul = resultSet.getString("tytul");
                String opis = resultSet.getString("opis");
               // BigDecimal kwota = resultSet.getBigDecimal("kwota"); problemy z BigDecimal
                TDane tdane = new TDane(id, nr, tytul, opis);
                dane.add(tdane);
            }
            resultSet.close();
            statement.close();
            connection.close();
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        } catch (SQLException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        return dane;
    }
    public int createDane(TDane dane){
        int result = -1;
                
        try {
            Class.forName(DRIVER);
            connection = DriverManager.getConnection(DB_URL, USERNAME, PASSWORD);
            statement = connection.prepareStatement(CREATE_DATA);
            statement.setLong(1, dane.getId());
            statement.setString(2, dane.getNr());
            statement.setString(3, dane.getTytul());
            statement.setString(4, dane.getOpis());
            result = statement.executeUpdate();
            statement.close();
            connection.close();
            
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        } catch (SQLException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return result;
    }
    public int deleteDane(int daneID){
       int result = -1;
       
        try {
            Class.forName(DRIVER);
            connection = DriverManager.getConnection(DB_URL, USERNAME, PASSWORD);
            statement = connection.prepareStatement(DELETE_DATA);
            statement.setInt(1, daneID);
            result = statement.executeUpdate();
            statement.close();
            connection.close();
            
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        } catch (SQLException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        
       return result;
    }
    public int updateDane(long daneID, TDane dane){
       int result = -1;
                
        try {
            Class.forName(DRIVER);
            connection = DriverManager.getConnection(DB_URL, USERNAME, PASSWORD);
            statement = connection.prepareStatement(UPDATE_DATA);
            statement.setString(1, dane.getNr());
            statement.setString(2, dane.getTytul());
            statement.setString(3, dane.getOpis());
            statement.setLong(4, daneID);
            result = statement.executeUpdate();
            statement.close();
            connection.close();
            
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        } catch (SQLException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return result;
    }
    
    public TDane findByID(int daneID){
       ArrayList<TDane> dane = new ArrayList<TDane>();
        try {
            Class.forName(DRIVER);
            connection = DriverManager.getConnection(DB_URL, USERNAME, PASSWORD);
            statement = connection.prepareStatement(FIND_BY_ID);
            statement.setInt(1, daneID);
            resultSet = statement.executeQuery();
            while(resultSet.next()){
                long id = resultSet.getInt("id");
                String nr = resultSet.getString("nr");
                String tytul = resultSet.getString("tytul");
                String opis = resultSet.getString("opis");
               // BigDecimal kwota = resultSet.getBigDecimal("kwota"); problemy z BigDecimal
                TDane tdane = new TDane(id, nr, tytul, opis);
                dane.add(tdane);
            }
            resultSet.close();
            statement.close();
            connection.close();
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        } catch (SQLException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        return dane.get(0);
    }
    
    public long getMaxID (){
        
        long maxID = 0;
        
        try {
            Class.forName(DRIVER);
            connection = DriverManager.getConnection(DB_URL, USERNAME, PASSWORD);
            statement = connection.prepareStatement(MAX_ID);
            resultSet = statement.executeQuery();
          
             while(resultSet.next()){
                 maxID = resultSet.getLong("maxID");
            }
           
            resultSet.close();
            statement.close();
            connection.close();
            
        } catch (SQLException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DaneDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    return maxID;
    }
    
    private static DaneDAO instance = null;

    public DaneDAO() {}

    public static DaneDAO getInstance(){
        if(instance == null){
            instance = new DaneDAO();
        }
        return instance;
    }
//    public static void main(String[] args){
//    DaneDAO ddao = DaneDAO.getInstance();
//    ArrayList<TDane> dane = ddao.findAllDane();
//    System.out.println(dane);
//    }
}
