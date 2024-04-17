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
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void btnFormInserimento_Click(object sender, EventArgs e)
        {
            Form Inserimento = new Inserimento();
            Inserimento.Show();
        }

        private void btnVisualizza1_Click(object sender, EventArgs e)
        {
            listBox1.Items.Clear();
            for (int i = 0; i < Program.ne; i++)
            {
                listBox1.Items.Add(Program.elenco[i].sNome + "" + Program.elenco[i].sCognome + " " + Program.elenco[i].sTipologia + " " + Program.elenco[i].sTitolo + " " + Program.elenco[i].sAnnoUscita + " " + Program.elenco[i].IncassoOttenuto);
            }
            
        }

        private void btnVisualizza2_Click(object sender, EventArgs e)
        {
            for (int i = 0; i < Program.ne; i++)
            {

            }
        }
    }
}
