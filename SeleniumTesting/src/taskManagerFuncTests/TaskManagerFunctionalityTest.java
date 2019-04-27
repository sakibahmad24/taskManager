package taskManagerFuncTests;

import org.openqa.selenium.Alert;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class TaskManagerFunctionalityTest {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		System.setProperty("webdriver.chrome.driver", "H:/Eclipse/Library Files/chromedriver.exe");
		WebDriver driver = new ChromeDriver();
		
		driver.get("http://localhost/todolist");
		driver.manage().window().maximize();
		
		
		/*
		 * Trying to login
		 */
		
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[1]/input")).sendKeys("mirabid");
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[2]/input")).sendKeys("26031971");
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[3]/input")).click();
		
		/*
		 * following test is for adding new todolist
		 */
		
		
		for(int i = 0; i<2; i++) {
			
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
		
		/*
		 * todolist deleting tested succesfully
		 * pass the value of "i<n" here n is the number of total todolist available
		 */
		 
		
		for (int i = 0; i < 6; i++) {
			driver.findElement(By.linkText("Home")).click();
			driver.findElement(By.linkText("View List")).click();
			
			driver.findElement(By.linkText("Delete List")).click();
			
			Alert alert = driver.switchTo().alert();
			
			alert.accept();
			
			
		}
		
		/*
		 * The following test case is for editing 
		 * todolists
		 */
		
		for (int e = 0; e<8; e++) {
			driver.findElement(By.linkText("Home")).click();
			driver.findElement(By.linkText("View List")).click();
			driver.findElement(By.linkText("Edit list")).click();
			driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[1]/input")).clear();
			driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[2]/textarea")).clear();
			
			driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[1]/input")).sendKeys("List " + e + "edited");
			driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[2]/textarea")).sendKeys("this is a edited version");
			driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[3]/input")).click();
		}
		
		driver.findElement(By.xpath("//*[@id=\"logout_form\"]/input")).click();
		
		
	
	}

}
