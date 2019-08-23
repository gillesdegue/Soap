package vue;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import domaine.Utilisateur;
import local.mglsi.soap.MyServicesPort;
import local.mglsi.soap.MyServicesService;

import javax.swing.JLabel;
import javax.swing.ImageIcon;
import java.awt.Font;
import javax.swing.JTextArea;
import javax.swing.JButton;
import java.awt.Color;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

public class Authentification extends JFrame {

	private JPanel contentPane;
	private MyServicesPort port = new MyServicesService().getMyServicesPort();

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					Authentification frame = new Authentification();
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
	public Authentification() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 591, 474);
		contentPane = new JPanel();
		contentPane.setBackground(new Color(245, 245, 220));
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		JLabel lblNewLabel = new JLabel("");
		lblNewLabel.setIcon(new ImageIcon("F:\\LAB\\img\\user1.jpg"));
		lblNewLabel.setBounds(212, 11, 252, 150);
		contentPane.add(lblNewLabel);
		
		JLabel lblNomDutilisateur = new JLabel("Nom D'Utilisateur");
		lblNomDutilisateur.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblNomDutilisateur.setBounds(120, 195, 122, 19);
		contentPane.add(lblNomDutilisateur);
		
		JLabel lblMotDePasse = new JLabel("Mot De Passe");
		lblMotDePasse.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblMotDePasse.setBounds(120, 255, 111, 19);
		contentPane.add(lblMotDePasse);
		
		JTextArea txtLogin = new JTextArea();
		txtLogin.setBounds(274, 194, 154, 22);
		contentPane.add(txtLogin);
		
		JTextArea txtpwd = new JTextArea();
		txtpwd.setBounds(274, 254, 159, 22);
		contentPane.add(txtpwd);
		JLabel message = new JLabel();
		message.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		message.setBounds(120, 280, 400, 50);
		contentPane.add(message);
		JButton btnNewButton = new JButton("Se Connecter");
		btnNewButton.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				String login,pwd;
				login = txtLogin.getText();
				pwd = txtpwd.getText();
				if(port.login(login, pwd).equals("1")) 
				{
					dispose();
					new GestionUtilisateur().setVisible(true);
				}else {
					message.setText("Erreur de connexion pseudo ou pwd incorrect ....");
				}
				
			}
		});
		btnNewButton.setBackground(new Color(107, 142, 35));
		btnNewButton.setForeground(new Color(255, 255, 255));
		btnNewButton.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		btnNewButton.setBounds(212, 335, 128, 33);
		contentPane.add(btnNewButton);
		
		JButton btnNewButton_1 = new JButton("Quitter");
		btnNewButton_1.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				dispose();
				new MenuGeneral();
			}
		});
		btnNewButton_1.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		btnNewButton_1.setForeground(new Color(255, 255, 240));
		btnNewButton_1.setBackground(new Color(139, 0, 0));
		btnNewButton_1.setBounds(455, 38, 90, 33);
		contentPane.add(btnNewButton_1);
	}
}
