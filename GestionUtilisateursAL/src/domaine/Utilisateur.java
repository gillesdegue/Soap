package domaine;

public class Utilisateur {
	
	private int id;
	private String nom;
	private String prenom;
	private String pseudo;
	private String motDePasse;
	private String role;
	
	public Utilisateur() {
		
	}
	public Utilisateur(int id, String nom, String prenom, String pseudo, String motDePasse, String role) {
		this.id=id;
		this.nom=nom;
		this.prenom=prenom;
		this.pseudo=pseudo;
		this.motDePasse=motDePasse;
		this.role=role;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id=id;
	}
	public String getNom() {
		return nom;
	}
	public void setNom(String nom) {
		this.nom=nom;
	}
	public String getPrenom() {
		return prenom;
	}
	public void setPrenom(String prenom) {
		this.prenom=prenom;
	}
	public String getPseudo() {
		return this.pseudo;
	}
	public void setPseudo(String pseudo) {
		this.pseudo=pseudo;
	}
	public String getMotDePasse() {
		return motDePasse;
	}
	public void setMotDePasse(String motDePasse) {
		this.motDePasse=motDePasse;
	}
	public String getRole() {
		return role;
	}
	public void setRole(String role) {
		this.role=role;
	}

}
