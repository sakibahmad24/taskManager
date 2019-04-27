package UITestBrowserInteractionTest;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class UITestBrowserInteracTest {

	public static void main(String[] args) {
		
		System.setProperty("webdriver.chrome.driver", "H:/Eclipse/Library Files/chromedriver.exe");
		
		WebDriver driver = new ChromeDriver();
		
		driver.get("http://localhost/todolist");
		driver.manage().window().maximize();
		
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[1]/input")).sendKeys("mirabid");
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[2]/input")).sendKeys("26031971");
		driver.findElement(By.xpath("//*[@id=\"login_form\"]/p[3]/input")).click();
		
		//comparing page url with the expected url
		
		String actualHome = driver.getCurrentUrl();
		
		if(actualHome.equals("http://localhost/todolist/home/index")) {
			System.out.println("The home url is correct");
		}
		
		else {
			System.out.println("the URL is wrong");
		}
	
		//checking the lists page url
		driver.findElement(By.linkText("Lists")).click();
		
		String actualList = driver.getCurrentUrl();
		
		if(actualList.equals("http://localhost/todolist/lists")) {
			System.out.println("this is a right url");
		}
		else {
			System.out.println("this is a wrong url");
		}
		
		
		//checking home url after clicking back
		driver.navigate().back();
		
		
		String urlBackToHome = driver.getCurrentUrl();
		
		if(urlBackToHome.equals("http://localhost/todolist/home/index")) {
			System.out.println("The home url is correct");
		}
		
		else {
			System.out.println("the URL is wrong");
		}
		
		//checking forward url
		
		driver.navigate().forward();
		String urlForwardToLists = driver.getCurrentUrl();
		
		if(urlForwardToLists.equals("http://localhost/todolist/lists")) {
			System.out.println("this is a right url");
		}
		else {
			System.out.println("this is a wrong url");
		}
		
		
		
		
		

	}

}
