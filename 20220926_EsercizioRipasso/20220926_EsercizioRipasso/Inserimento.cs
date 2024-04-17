using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace _20220926_EsercizioRipasso
{
    public partial class Inserimento : Form
    {
        public Inserimento()
        {
            InitializeComponent();
            
        }

        private void btnInserisci_Click(object sender, EventArgs e)
        {
            //definisco la lunghezza dell'array
            Array.Resize(ref Program.elenco, Program.ne + 1);

            //assegno le textbox alle variabili delle strutture
            Program.elenco[Program.ne].sNome = tbxNomeRegista.Text;
            Program.elenco[Program.ne].sCognome = tbxCognomeRegista.Text;
            Program.elenco[Program.ne].sTitolo = tbxAnnoUscita.Text;
            Program.elenco[Program.ne].sAnnoUscita = Convert.ToInt32(tbxAnnoUscita.Text);
            Program.elenco[Program.ne].IncassoOttenuto = Convert.ToInt32(tbxIncassoOttenuto.Text);
            Program.elenco[Program.ne].sTipologia = cbxTipologia.Text;

            //pulisco le textbox ad ogni click
            tbxNomeRegista.Clear();
            tbxCognomeRegista.Clear();
            tbxAnnoUscita.Clear();
            tbxAnnoUscita.Clear();
            tbxIncassoOttenuto.Clear();
            cbxTipologia.Text = "";


        }

        private void Inserimento_Load(object sender, EventArgs e)
        {
            
        }
    }
}
