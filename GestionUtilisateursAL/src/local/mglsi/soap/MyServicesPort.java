
package local.mglsi.soap;

import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebResult;
import javax.jws.WebService;
import javax.jws.soap.SOAPBinding;
import javax.xml.bind.annotation.XmlSeeAlso;


/**
 * This class was generated by the JAX-WS RI.
 * JAX-WS RI 2.2.9-b130926.1035
 * Generated source version: 2.2
 * 
 */
@WebService(name = "MyServicesPort", targetNamespace = "http://mglsi.local/soap")
@SOAPBinding(style = SOAPBinding.Style.RPC)
@XmlSeeAlso({
    ObjectFactory.class
})
public interface MyServicesPort {


    /**
     * Lister Utilisateur Function
     * 
     * @return
     *     returns local.mglsi.soap.ArrayOfUser
     */
    @WebMethod(action = "http://mglsi.local/soap#listerUser")
    @WebResult(partName = "return")
    public ArrayOfUser listerUser();

    /**
     * Ajouter un Utilisateur Function
     * 
     * @param password
     * @param nom
     * @param prenom
     * @param pseudo
     * @return
     *     returns java.lang.String
     */
    @WebMethod(action = "http://mglsi.local/soap#ajouterUser")
    @WebResult(partName = "return")
    public String ajouterUser(
        @WebParam(name = "nom", partName = "nom")
        String nom,
        @WebParam(name = "prenom", partName = "prenom")
        String prenom,
        @WebParam(name = "pseudo", partName = "pseudo")
        String pseudo,
        @WebParam(name = "password", partName = "password")
        String password);

    /**
     * Ajouter un Utilisateur Function
     * 
     * @param password
     * @param id
     * @param nom
     * @param prenom
     * @param pseudo
     * @return
     *     returns java.lang.String
     */
    @WebMethod(action = "http://mglsi.local/soap#modifierUser")
    @WebResult(partName = "return")
    public String modifierUser(
        @WebParam(name = "id", partName = "id")
        String id,
        @WebParam(name = "nom", partName = "nom")
        Object nom,
        @WebParam(name = "prenom", partName = "prenom")
        Object prenom,
        @WebParam(name = "pseudo", partName = "pseudo")
        Object pseudo,
        @WebParam(name = "password", partName = "password")
        Object password);

    /**
     * Supprimer un Utilisateur Function
     * 
     * @param id
     * @return
     *     returns java.lang.String
     */
    @WebMethod(action = "http://mglsi.local/soap#supprimerUser")
    @WebResult(partName = "return")
    public String supprimerUser(
        @WebParam(name = "id", partName = "id")
        int id);

    /**
     * Login Function
     * 
     * @param pseudo
     * @param token
     * @return
     *     returns java.lang.String
     */
    @WebMethod(operationName = "Login", action = "http://mglsi.local/soap#Login")
    @WebResult(partName = "return")
    public String login(
        @WebParam(name = "pseudo", partName = "pseudo")
        String pseudo,
        @WebParam(name = "token", partName = "token")
        String token);

    /**
     * Returns Hello World.
     * 
     * @param world
     * @return
     *     returns java.lang.String
     */
    @WebMethod(action = "http://mglsi.local/soap#getInterAdmins")
    @WebResult(partName = "return")
    public String getInterAdmins(
        @WebParam(name = "world", partName = "world")
        String world);

    /**
     * Use test soap service
     * 
     * @param name
     * @return
     *     returns java.lang.String
     */
    @WebMethod(operationName = "SayHello", action = "http://mglsi.local/soap#SayHello")
    @WebResult(partName = "return")
    public String sayHello(
        @WebParam(name = "name", partName = "name")
        String name);

}
