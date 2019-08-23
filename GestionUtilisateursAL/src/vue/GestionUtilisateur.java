package vue;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import domaine.Utilisateur;
import local.mglsi.soap.MyServicesPort;
import local.mglsi.soap.MyServicesService;
import local.mglsi.soap.User;

import java.awt.Color;
import javax.swing.JLabel;
import javax.swing.ImageIcon;
import java.awt.Font;
import javax.swing.JTextField;
import javax.swing.JComboBox;
import javax.swing.DefaultComboBoxModel;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.util.List;
import java.awt.event.ActionEvent;

public class GestionUtilisateur extends JFrame {
	private MyServicesPort port = new MyServicesService().getMyServicesPort();
	private JPanel contentPane;
	private JTextField textField;
	private JTextField textField_1;
	private JTextField textField_2;
	private JTextField textField_3;
	private JTextField textField_4;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					GestionUtilisateur frame = new GestionUtilisateur();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public GestionUtilisateur() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 675, 508);
		contentPane = new JPanel();
		contentPane.setBackground(new Color(245, 245, 220));
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		JLabel lblNewLabel = new JLabel("");
		lblNewLabel.setIcon(new ImageIcon("F:\\LAB\\img\\admin.png"));
		lblNewLabel.setBounds(0, -20, 199, 129);
		contentPane.add(lblNewLabel);
		
		JLabel lblId = new JLabel("Id");
		lblId.setFont(new Font("Times New Roman", Font.PLAIN, 14));
		lblId.setBounds(165, 131, 46, 14);
		contentPane.add(lblId);
		
		JLabel lblNom = new JLabel("Nom");
		lblNom.setFont(new Font("Times New Roman", Font.PLAIN, 14));
		lblNom.setBounds(165, 184, 46, 14);
		contentPane.add(lblNom);
		
		JLabel lblPrenom = new JLabel("Prenom");
		lblPrenom.setFont(new Font("Times New Roman", Font.PLAIN, 14));
		lblPrenom.setBounds(165, 226, 46, 14);
		contentPane.add(lblPrenom);
		
		JLabel lblPseudo = new JLabel("Pseudo");
		lblPseudo.setFont(new Font("Times New Roman", Font.PLAIN, 14));
		lblPseudo.setBounds(165, 267, 46, 14);
		contentPane.add(lblPseudo);
		
		JLabel lblMotDePasse = new JLabel("Mot de passe");
		lblMotDePasse.setFont(new Font("Times New Roman", Font.PLAIN, 14));
		lblMotDePasse.setBounds(165, 309, 92, 14);
		contentPane.add(lblMotDePasse);
		
		JLabel lblStatut = new JLabel("Statut");
		lblStatut.setFont(new Font("Times New Roman", Font.PLAIN, 14));
		lblStatut.setBounds(165, 348, 46, 14);
		contentPane.add(lblStatut);
		
		textField = new JTextField();
		textField.setBounds(276, 129, 86, 20);
		contentPane.add(textField);
		textField.setColumns(10);
		
		textField_1 = new JTextField();
		textField_1.setBounds(276, 182, 133, 20);
		contentPane.add(textField_1);
		textField_1.setColumns(10);
		
		textField_2 = new JTextField();
		textField_2.setBounds(276, 224, 157, 20);
		contentPane.add(textField_2);
		textField_2.setColumns(10);
		
		textField_3 = new JTextField();
		textField_3.setBounds(276, 265, 157, 20);
		contentPane.add(textField_3);
		textField_3.setColumns(10);
		
		textField_4 = new JTextField();
		textField_4.setBounds(276, 307, 157, 20);
		contentPane.add(textField_4);
		textField_4.setColumns(10);
		
		JLabel message = new JLabel();
		message.setFont(new Font("Times New Roman", Font.PLAIN, 14));
		message.setBounds(276, 346, 400, 50);
		contentPane.add(message);
		
		JButton btnRechercher = new JButton("Rechercher");
		btnRechercher.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		btnRechercher.setForeground(new Color(255, 255, 255));
		btnRechercher.setBackground(new Color(107, 142, 35));
		btnRechercher.setBounds(470, 128, 121, 35);
		contentPane.add(btnRechercher);
		
		JButton btnAjouter = new JButton("Ajouter");
		btnAjouter.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				String nom, prenom, pseudo, password, res;
				nom = textField_1.getText();
				prenom = textField_2.getText();
				pseudo = textField_3.getText();
				password = textField_4.getText();
				res = port.ajouterUser(nom, prenom, pseudo, password);
				if(res.equals("1")) {
					message.setText("Enregistrement reussi avec success");
				}else {
					message.setText("Echec de l'enregistrement");
				}
			}
		});
		btnAjouter.setBackground(new Color(0, 100, 0));
		btnAjouter.setForeground(new Color(255, 255, 255));
		btnAjouter.setFont(new Font("Times New Roman", Font.PLAIN, 14));
		btnAjouter.setBounds(136, 401, 89, 23);
		contentPane.add(btnAjouter);
		
		JButton btnModifier = new JButton("Modifier");
		btnModifier.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				
				String id, nom, prenom, pseudo, password, res;
				id = textField.getText();
				nom = textField_1.getText();
				prenom = textField_2.getText();
				pseudo = textField_3.getText();
				password = textField_4.getText();
				res = port.modifierUser(id,nom, prenom, pseudo, password);
				if(res.equals("1")) {
					message.setText("Enregistrement modifier avec success");
				}else {
					message.setText("Echec de la modification");
				}
			}
		});
		btnModifier.setBackground(new Color(32, 178, 170));
		btnModifier.setForeground(new Color(255, 255, 255));
		btnModifier.setFont(new Font("Times New Roman", Font.PLAIN, 14));
		btnModifier.setBounds(273, 401, 89, 23);
		contentPane.add(btnModifier);
		
		JButton btnSupprimer = new JButton("Supprimer");
		btnSupprimer.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				int id;
				String res;
				id = Integer.parseInt(textField.getText());
				res = port.supprimerUser(id);
				if(res.equals("1")) {
					message.setText("Enregistrement supprimer avec success");
				}else {
					message.setText("Echec de la suppression");
				}
			}
		});
		btnSupprimer.setBackground(new Color(139, 0, 0));
		btnSupprimer.setForeground(new Color(255, 255, 255));
		btnSupprimer.setFont(new Font("Times New Roman", Font.PLAIN, 14));
		btnSupprimer.setBounds(397, 401, 101, 23);
		contentPane.add(btnSupprimer);
		
		JLabel lblNewLabel_1 = new JLabel("");
		lblNewLabel_1.setIcon(new ImageIcon("F:\\LAB\\img\\fond2.jpg"));
		lblNewLabel_1.setBounds(218, -36, 297, 198);
		contentPane.add(lblNewLabel_1);
		
		JLabel lblNewLabel_2 = new JLabel("");
		lblNewLabel_2.setBounds(273, 40, 46, 14);
		contentPane.add(lblNewLabel_2);
		
		JButton btnAfficher = new JButton("Afficher");
		btnAfficher.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				List<User> user = port.listerUser().getItem();
				dispose();
				new ListeUtilisateur(user).setVisible(true);
			}
		});
		btnAfficher.setForeground(Color.WHITE);
		btnAfficher.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		btnAfficher.setBackground(new Color(107, 142, 35));
		btnAfficher.setBounds(470, 181, 121, 35);
		contentPane.add(btnAfficher);
		
		JButton btnQuitter = new JButton("Quitter");
		btnQuitter.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				dispose();
				new MenuGeneral().setVisible(true);
			}
		});
		btnQuitter.setForeground(Color.WHITE);
		btnQuitter.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		btnQuitter.setBackground(new Color(128, 0, 0));
		btnQuitter.setBounds(538, 0, 121, 35);
		contentPane.add(btnQuitter);
	}
}
