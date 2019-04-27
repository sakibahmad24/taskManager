package taskManager;

import static org.junit.Assert.assertTrue;

import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

public class LaunchApplication {

	//@SuppressWarnings("deprecation")
	public static void main(String[] args) {
		
		
		System.setProperty("webdriver.chrome.driver", "H:/Eclipse/Library Files/chromedriver.exe");
		
		WebDriver driver = new ChromeDriver();
		
		driver.get("http://localhost/todolist");
		driver.manage().window().maximize();
		
		//finds elements using name
		//driver.findElement(By.name("name")).sendKeys("kazi");
		
		//finds elements using xpath
//		driver.findElement(By.xpath("/html/body/div[1]/div/div/div/p/a")).click();
//		
//		driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[1]/input")).sendKeys("Rabid");
//		driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[2]/input")).sendKeys("Islam");
//		driver.findElement(By.name("email")).sendKeys("rabid@gmail.com");
//		driver.findElement(By.name("username")).sendKeys("rabidmi");
//		driver.findElement(By.name("password")).sendKeys("26031971");
//		driver.findElement(By.name("password2")).sendKeys("26031971");
//		
//		driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[7]/input")).click();
		
		/*
		 * test script for login below
		 */
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[1]/input")).sendKeys("mirabid");
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[2]/input")).sendKeys("26031971");
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[3]/input")).click();
		
		/*
		 * test script for redirecting to the create todolist page
		 */
		driver.findElement(By.xpath("/html/body/div[1]/div/div/div/ul/li[2]/a")).click();
//		driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/p[2]/a")).click();
		
		/*
		 * Searching for a specific string available in the page
		 * 
		 */
		
		String text = "First List";
		List<WebElement> list = driver.findElements(By.xpath("//*[contains(text(),'" + text + "')]"));
		
		if(list.size()>0) {
			System.out.println("Element(s) found");
		}
		else {
			System.out.println("Element not found");
		}
		
		
		
		
		
		/*
		 * test script for filling up add list form
		 */
		
		driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/p[2]/a")).click();
		
		driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[1]/input")).sendKeys("Second List");
		driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[2]/textarea")).sendKeys("This is the second list to be enlist");
		
		driver.findElement(By.xpath("/html/body/div[2]/div/div[2]/form/p[3]/input")).click();
		
		
		/*
		 * check if the recently added element is present in the list
		 * 
		 */
		
		String text2 = "enlist";
		List<WebElement> list2 = driver.findElements(By.xpath("//*[contains(text(),'" + text2 + "')]"));
		
		if(list2.size()>0) {
			System.out.println("Element(s) found");
		}
		else {
			System.out.println("Element not found");
		}
		
		
		
		
		
	}

}
