package vue;

import java.util.List;

import local.mglsi.soap.MyServicesPort;
import local.mglsi.soap.MyServicesService;
import local.mglsi.soap.User;

public class Test {

	public static void main(String[] args) {
		
		MyServicesPort port = new MyServicesService().getMyServicesPort();
		List<User> user = port.listerUser().getItem();
		
		System.out.println(user.get(0).getPseudo());

	}

}
