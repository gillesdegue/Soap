package vue;

import java.awt.BorderLayout;
import java.awt.EventQueue;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.rmi.Naming;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;


import javax.swing.JLabel;
import javax.swing.ImageIcon;
import javax.swing.JButton;

import java.awt.Color;
import java.awt.Font;

public class MenuGeneral extends JFrame implements ActionListener  {
	private JPanel pan1,pan2,pan3;
	private JLabel  lnews_2,ls,lsa,lserv,lic,lns,lnsalle,lnadmin;
	private JButton serveur, salle, admin, qt,lnews;
	
	

	public static void main(String[] args) {
	
				try {
					 
				       MenuGeneral frame = new MenuGeneral();
				       frame.setVisible(true);
					}
					
					   catch (Exception ex)
					   {
						   System.out.println("impossible de se connecter");
					     System.out.println(ex.getMessage());	   
					   }
			}
		
		public MenuGeneral() {
		pan1=new JPanel();
		pan1.setBackground(new Color(245, 245, 220));
		pan1.setLayout(null);
		
		lnews = new JButton();
		lnews.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
	    		  dispose();
	    		  new Authentification().setVisible(true);

			}
		});
		lnews.setIcon(new ImageIcon("F:\\LAB\\img\\user1.jpg"));
		lnews.setBounds(253, 130, 271, 236);
		pan1.add(lnews);
		
		lic = new JLabel();
		lic.setBackground(Color.DARK_GRAY);
		lic.setForeground(new Color(128, 0, 0));
		lic.setFont(new Font("Times New Roman", Font.PLAIN, 30));
		lic.setText("Gestion Des Utilisateurs");
		lic.setBounds(249, 16, 323, 34);
		pan1.add(lic);
		
		
		
		
		
		lnsalle = new JLabel();
		lnsalle.setIcon(new ImageIcon("F:\\LAB\\img\\start.png"));
		lnsalle.setBounds(0, 66, 988, 14);
		pan1.add(lnsalle);
		
		
		qt = new JButton("QUITTER");
		qt.setIcon(null);
		qt.setBackground(new Color(128, 0, 0));
		qt.setForeground(new Color(255, 255, 255));
		qt.setFont(new Font("Times New Roman", Font.PLAIN, 14));
		qt.setBounds(597, 13, 98,50);
		qt.addActionListener(this);
		pan1.add(qt);
		
		
		lnews_2 = new JLabel();
		lnews_2.setBackground(new Color(128, 0, 0));
		lnews_2.setIcon(new ImageIcon("F:\\LAB\\img\\fond1.png"));
		lnews_2.setBounds(0, 74, 936,445);
		pan1.add(lnews_2);
		
		ls=new JLabel("Liste Des Serveurs");
		ls.setBounds(20, 1500, 1000,50);
		pan1.add(ls);
		getContentPane().add(pan1);
		
		
		setTitle("Client RMI Swing Gestion DATACENTER");
		setSize(806,555);
		setLocationRelativeTo(null);
		setDefaultCloseOperation(EXIT_ON_CLOSE);
		setVisible(true);
		
	}
	
	public void actionPerformed(ActionEvent e)
	{
      
					if (e.getSource()==qt)
					{
						
						dispose();
						System.exit(0);
					    }
						
					}
	
}
