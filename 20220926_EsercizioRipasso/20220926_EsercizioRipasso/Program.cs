using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace _20220926_EsercizioRipasso
{
    static class Program
    {
        /// <summary>
        /// Punto di ingresso principale dell'applicazione.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new Form1());
        }

        //faccio la struttura per la tipolgia dei film
        public enum tipologia
        {
            azione,
            thriller,
            commedia,
            horror,
            animazione,
            documentario,
            fantascienza,
        }
        //faccio la struttura dei dati dei film
        public struct Film
        {
            public string sNome;
            public string sCognome;
            public string sTitolo;
            public int IncassoOttenuto;
            public int sAnnoUscita;
            public string sTipologia;
        }
        //creo un elenco
        public static Film[] elenco = new Film[0];
        public static int ne;

    }
}
