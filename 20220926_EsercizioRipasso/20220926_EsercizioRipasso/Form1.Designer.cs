namespace _20220926_EsercizioRipasso
{
    partial class Form1
    {
        /// <summary>
        /// Variabile di progettazione necessaria.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Pulire le risorse in uso.
        /// </summary>
        /// <param name="disposing">ha valore true se le risorse gestite devono essere eliminate, false in caso contrario.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Codice generato da Progettazione Windows Form

        /// <summary>
        /// Metodo necessario per il supporto della finestra di progettazione. Non modificare
        /// il contenuto del metodo con l'editor di codice.
        /// </summary>
        private void InitializeComponent()
        {
            this.listBox1 = new System.Windows.Forms.ListBox();
            this.btnVisualizza1 = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.btnVisualizza2 = new System.Windows.Forms.Button();
            this.label3 = new System.Windows.Forms.Label();
            this.btnVisualizza3 = new System.Windows.Forms.Button();
            this.btnFormInserimento = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // listBox1
            // 
            this.listBox1.FormattingEnabled = true;
            this.listBox1.Location = new System.Drawing.Point(12, 12);
            this.listBox1.Name = "listBox1";
            this.listBox1.Size = new System.Drawing.Size(468, 524);
            this.listBox1.TabIndex = 0;
            // 
            // btnVisualizza1
            // 
            this.btnVisualizza1.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(192)))), ((int)(((byte)(255)))));
            this.btnVisualizza1.Font = new System.Drawing.Font("Microsoft Sans Serif", 13F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnVisualizza1.Location = new System.Drawing.Point(696, 88);
            this.btnVisualizza1.Name = "btnVisualizza1";
            this.btnVisualizza1.Size = new System.Drawing.Size(117, 45);
            this.btnVisualizza1.TabIndex = 1;
            this.btnVisualizza1.Text = "Visualizza";
            this.btnVisualizza1.UseVisualStyleBackColor = false;
            this.btnVisualizza1.Click += new System.EventHandler(this.btnVisualizza1_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Microsoft Sans Serif", 13F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(538, 43);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(262, 22);
            this.label1.TabIndex = 2;
            this.label1.Text = "Visualizza tutti i film e i loro dati.";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Microsoft Sans Serif", 13F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.Location = new System.Drawing.Point(574, 184);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(226, 44);
            this.label2.TabIndex = 3;
            this.label2.Text = "Visualizza il film e il regista \r\ncon il maggior incasso.";
            // 
            // btnVisualizza2
            // 
            this.btnVisualizza2.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(192)))), ((int)(((byte)(255)))));
            this.btnVisualizza2.Font = new System.Drawing.Font("Microsoft Sans Serif", 13F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnVisualizza2.Location = new System.Drawing.Point(578, 251);
            this.btnVisualizza2.Name = "btnVisualizza2";
            this.btnVisualizza2.Size = new System.Drawing.Size(204, 60);
            this.btnVisualizza2.TabIndex = 4;
            this.btnVisualizza2.Text = "Visualizza";
            this.btnVisualizza2.UseVisualStyleBackColor = false;
            this.btnVisualizza2.Click += new System.EventHandler(this.btnVisualizza2_Click);
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Microsoft Sans Serif", 13F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label3.Location = new System.Drawing.Point(516, 345);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(346, 44);
            this.label3.TabIndex = 5;
            this.label3.Text = "Visualizza i film di una deterinata tipologia \r\ncon la media del loro incasso.";
            // 
            // btnVisualizza3
            // 
            this.btnVisualizza3.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(192)))), ((int)(((byte)(255)))));
            this.btnVisualizza3.Font = new System.Drawing.Font("Microsoft Sans Serif", 13F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnVisualizza3.Location = new System.Drawing.Point(578, 402);
            this.btnVisualizza3.Name = "btnVisualizza3";
            this.btnVisualizza3.Size = new System.Drawing.Size(204, 60);
            this.btnVisualizza3.TabIndex = 6;
            this.btnVisualizza3.Text = "Visualizza";
            this.btnVisualizza3.UseVisualStyleBackColor = false;
            // 
            // btnFormInserimento
            // 
            this.btnFormInserimento.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(192)))), ((int)(((byte)(255)))));
            this.btnFormInserimento.Font = new System.Drawing.Font("Microsoft Sans Serif", 13F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnFormInserimento.Location = new System.Drawing.Point(542, 81);
            this.btnFormInserimento.Name = "btnFormInserimento";
            this.btnFormInserimento.Size = new System.Drawing.Size(135, 58);
            this.btnFormInserimento.TabIndex = 7;
            this.btnFormInserimento.Text = "Vai all\'inserimento";
            this.btnFormInserimento.UseVisualStyleBackColor = false;
            this.btnFormInserimento.Click += new System.EventHandler(this.btnFormInserimento_Click);
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(874, 550);
            this.Controls.Add(this.btnFormInserimento);
            this.Controls.Add(this.btnVisualizza3);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.btnVisualizza2);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.btnVisualizza1);
            this.Controls.Add(this.listBox1);
            this.Name = "Form1";
            this.Text = "Form1";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ListBox listBox1;
        private System.Windows.Forms.Button btnVisualizza1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Button btnVisualizza2;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Button btnVisualizza3;
        private System.Windows.Forms.Button btnFormInserimento;
    }
}

