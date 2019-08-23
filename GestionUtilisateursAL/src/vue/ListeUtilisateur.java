package vue;

import javax.swing.*;
import java.awt.event.*;
import java.rmi.Naming;
import java.awt.*;
import java.util.*;
import java.util.List;

import javax.swing.table.DefaultTableModel;
import domaine.*;
import local.mglsi.soap.User;

public class ListeUtilisateur extends JFrame implements ActionListener
{
	private JTable table;
	private List<User> liste;
	private JScrollPane sc;
	private JPanel panneau1,panneau2;
	private JButton qt;
  
	
	public ListeUtilisateur(List<User> user)
	{
	
	
		panneau1=new JPanel();
		panneau2=new JPanel();
		qt = new JButton("Quitter");
		 this.liste=user;
		  sc  = new JScrollPane();
		  table = new JTable();
		  sc.setViewportView(table);
		  DefaultTableModel modele = (DefaultTableModel)table.getModel();
		  modele.addColumn("Id Utilisateur");
		  modele.addColumn("Nom");
		  modele.addColumn("Prenom");
		  modele.addColumn("Pseudo");
		  modele.addColumn("Role");

		  int ligne=0;
		  for (int i =0; i<this.liste.size(); i++)
		  {
			  modele.addRow( new Object[0]);
			  modele.setValueAt(this.liste.get(i).getId(),ligne,0);
			  modele.setValueAt(this.liste.get(i).getNom(), ligne, 1);
			  modele.setValueAt(this.liste.get(i).getPrenom(), ligne, 2);
			  modele.setValueAt(this.liste.get(i).getPseudo(), ligne, 3);
			  modele.setValueAt(this.liste.get(i).getRole(), ligne, 4);
			  ligne++;
		  }
		  setTitle("Client RMI:liste des Administrateurs");
		  setSize(550,500);
		  qt.addActionListener(this); 
		  panneau1.add(sc);
		  panneau2.add(qt);
		  add(panneau1,BorderLayout.NORTH);
		  add(panneau2,BorderLayout.SOUTH);
		  setLocationRelativeTo(null);
		  setVisible(true);
	}
    public void actionPerformed(ActionEvent e)
    {
    	if (e.getSource()==qt)
    	{

			try {
	    		  dispose();
	    		  new GestionUtilisateur().setVisible(true);
				}
				
				   catch (Exception ex)
				   {
					   System.out.println("impossible de se connecter");
				     System.out.println(ex.getMessage());	   
				   }    
    	}
    }
}
