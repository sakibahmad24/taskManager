package databaseTesting;

import  java.sql.Connection;		
import  java.sql.Statement;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

import  java.sql.ResultSet;		
import  java.sql.DriverManager;		
import  java.sql.SQLException;	

public class DatabaseTestingMain {

	public static void main(String[] args) throws  ClassNotFoundException, SQLException {
		// TODO Auto-generated method stub
		
		//Setting environment
		
		System.setProperty("webdriver.chrome.driver", "H:/Eclipse/Library Files/chromedriver.exe");
		
		WebDriver driver = new ChromeDriver();
		
		driver.get("http://localhost/todolist");
		driver.manage().window().maximize();
		
		String dbUrl = "jdbc:mysql://localhost:3306/todolist";					

		//Database Username		
		String username = "root";	
        
		//Database Password		
		String password = "";
		
		/*
		 * test script for login below
		 */
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[1]/input")).sendKeys("kazisakib");
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[2]/input")).sendKeys("26031971");
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[3]/input")).click();
		
		
		for(int i = 0; i<4; i++) {
			
			/*
			 * test script for redirecting to the create todolist page
			 */
			
			driver.findElement(By.xpath("/html/body/div[1]/div/div/div/ul/li[2]/a")).click();
		

			/*
			 * test script for filling up add list form
			 */
			 
			driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/p[2]/a")).click();
			
			driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[1]/input")).sendKeys("List No. " + i);
			driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[2]/textarea")).sendKeys("This is the No. " + i + " list to be enlisted");
			
			driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[3]/input")).click();
		
		}
		
		
		
		
		//Query to Execute		
		String query = "SELECT users.username FROM users WHERE users.id=(SELECT lists.user_id FROM `lists` ORDER BY id DESC LIMIT 1)";
        
 	    //Load mysql jdbc driver		
   	    Class.forName("com.mysql.jdbc.Driver");			
   
   		//Create Connection to DB		
    	Connection con = DriverManager.getConnection(dbUrl,username,password);
  
  		
    	//Create Statement Object		
	   Statement stmt = con.createStatement();					

			// Execute the SQL Query. Store results in ResultSet		
 		ResultSet rs= stmt.executeQuery(query);							
 		
 		String usernameExpected = "mirabid";
 		
 		while(rs.next()) {
 			String usernameActual = rs.getString(1);
 			System.out.println(usernameActual);
 			
 			if(usernameActual.equals(usernameExpected)) {
 	 			System.out.println("The username found as expected");
 	 		}
 	 		
 	 		else {
 	 			System.out.println("the username is wrong! There is error");
 	 		}
 		}
 		
 		
 		
 		
 		/*// While Loop to iterate through all data and print results		
		while (rs.next()){
	        		String myName = rs.getString(1);								        
                    String myAge = rs.getString(2);					                               
                    System. out.println(myName+"  "+myAge);		
            } */
			 // closing DB Connection		
			con.close();	
	}

}
