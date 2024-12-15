namespace WinFormsApp2
{
    partial class search
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(search));
            panel2 = new Panel();
            button2 = new Button();
            button6 = new Button();
            textBox1 = new TextBox();
            comboBox1 = new ComboBox();
            label10 = new Label();
            label7 = new Label();
            dataGridView1 = new DataGridView();
            label9 = new Label();
            button7 = new Button();
            panel4 = new Panel();
            panel1 = new Panel();
            pictureBox1 = new PictureBox();
            label1 = new Label();
            label4 = new Label();
            label2 = new Label();
            label3 = new Label();
            pictureBox4 = new PictureBox();
            pictureBox5 = new PictureBox();
            label5 = new Label();
            pictureBox6 = new PictureBox();
            pictureBox3 = new PictureBox();
            pictureBox2 = new PictureBox();
            panel5 = new Panel();
            pictureBox7 = new PictureBox();
            label6 = new Label();
            panel6 = new Panel();
            label8 = new Label();
            panel3 = new Panel();
            ((System.ComponentModel.ISupportInitialize)dataGridView1).BeginInit();
            panel4.SuspendLayout();
            panel1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)pictureBox1).BeginInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox4).BeginInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox5).BeginInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox6).BeginInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox3).BeginInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox2).BeginInit();
            panel5.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)pictureBox7).BeginInit();
            panel6.SuspendLayout();
            SuspendLayout();
            // 
            // panel2
            // 
            panel2.BackColor = Color.MediumPurple;
            panel2.Dock = DockStyle.Bottom;
            panel2.Location = new Point(0, 757);
            panel2.Name = "panel2";
            panel2.Size = new Size(1298, 10);
            panel2.TabIndex = 5;
            // 
            // button2
            // 
            button2.Anchor = AnchorStyles.Top | AnchorStyles.Right;
            button2.BackColor = Color.Transparent;
            button2.FlatAppearance.BorderSize = 0;
            button2.FlatStyle = FlatStyle.Flat;
            button2.Image = (Image)resources.GetObject("button2.Image");
            button2.Location = new Point(1207, 3);
            button2.Name = "button2";
            button2.Size = new Size(35, 33);
            button2.TabIndex = 21;
            button2.UseVisualStyleBackColor = false;
            button2.Click += button2_Click;
            // 
            // button6
            // 
            button6.Anchor = AnchorStyles.Top | AnchorStyles.Right;
            button6.BackColor = Color.Transparent;
            button6.FlatAppearance.BorderSize = 0;
            button6.FlatStyle = FlatStyle.Flat;
            button6.Image = (Image)resources.GetObject("button6.Image");
            button6.Location = new Point(1248, 3);
            button6.Name = "button6";
            button6.Size = new Size(33, 33);
            button6.TabIndex = 20;
            button6.UseVisualStyleBackColor = false;
            button6.Click += button6_Click;
            // 
            // textBox1
            // 
            textBox1.Location = new Point(356, 170);
            textBox1.Name = "textBox1";
            textBox1.Size = new Size(312, 31);
            textBox1.TabIndex = 58;
            // 
            // comboBox1
            // 
            comboBox1.DropDownStyle = ComboBoxStyle.DropDownList;
            comboBox1.FormattingEnabled = true;
            comboBox1.Items.AddRange(new object[] { "users", "cours" });
            comboBox1.Location = new Point(735, 168);
            comboBox1.Name = "comboBox1";
            comboBox1.Size = new Size(196, 33);
            comboBox1.TabIndex = 60;
            // 
            // label10
            // 
            label10.AutoSize = true;
            label10.Font = new Font("Arial", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label10.ForeColor = Color.Indigo;
            label10.Location = new Point(293, 236);
            label10.Name = "label10";
            label10.Size = new Size(262, 29);
            label10.TabIndex = 62;
            label10.Text = "Resultat de recherche";
            // 
            // label7
            // 
            label7.AutoSize = true;
            label7.Font = new Font("Arial", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label7.ForeColor = Color.Indigo;
            label7.Location = new Point(735, 136);
            label7.Name = "label7";
            label7.Size = new Size(168, 29);
            label7.TabIndex = 63;
            label7.Text = "Dans la table:";
            // 
            // dataGridView1
            // 
            dataGridView1.BackgroundColor = Color.White;
            dataGridView1.ColumnHeadersHeightSizeMode = DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            dataGridView1.EditMode = DataGridViewEditMode.EditProgrammatically;
            dataGridView1.Location = new Point(283, 278);
            dataGridView1.Name = "dataGridView1";
            dataGridView1.RowHeadersWidth = 62;
            dataGridView1.Size = new Size(998, 473);
            dataGridView1.TabIndex = 64;
            // 
            // label9
            // 
            label9.AutoSize = true;
            label9.Font = new Font("Arial", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label9.ForeColor = Color.Indigo;
            label9.Location = new Point(356, 138);
            label9.Name = "label9";
            label9.Size = new Size(141, 29);
            label9.TabIndex = 65;
            label9.Text = "Recherche:";
            // 
            // button7
            // 
            button7.BackColor = Color.Indigo;
            button7.FlatStyle = FlatStyle.Flat;
            button7.Font = new Font("Segoe UI Black", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            button7.ForeColor = SystemColors.ControlLightLight;
            button7.Location = new Point(1027, 152);
            button7.Name = "button7";
            button7.Size = new Size(209, 58);
            button7.TabIndex = 66;
            button7.Text = "Recherche";
            button7.UseVisualStyleBackColor = false;
            button7.Click += button7_Click;
            // 
            // panel4
            // 
            panel4.BackColor = Color.Indigo;
            panel4.Controls.Add(button2);
            panel4.Controls.Add(button6);
            panel4.Dock = DockStyle.Top;
            panel4.Location = new Point(0, 0);
            panel4.Name = "panel4";
            panel4.Size = new Size(1298, 36);
            panel4.TabIndex = 67;
            // 
            // panel1
            // 
            panel1.BackColor = Color.MediumPurple;
            panel1.Controls.Add(pictureBox1);
            panel1.Controls.Add(label1);
            panel1.Controls.Add(label4);
            panel1.Controls.Add(label2);
            panel1.Controls.Add(label3);
            panel1.Controls.Add(pictureBox4);
            panel1.Controls.Add(pictureBox5);
            panel1.Controls.Add(label5);
            panel1.Controls.Add(pictureBox6);
            panel1.Controls.Add(pictureBox3);
            panel1.Controls.Add(pictureBox2);
            panel1.Controls.Add(panel5);
            panel1.Dock = DockStyle.Left;
            panel1.Location = new Point(0, 36);
            panel1.Name = "panel1";
            panel1.Size = new Size(277, 721);
            panel1.TabIndex = 68;
            // 
            // pictureBox1
            // 
            pictureBox1.Image = (Image)resources.GetObject("pictureBox1.Image");
            pictureBox1.Location = new Point(15, 12);
            pictureBox1.Name = "pictureBox1";
            pictureBox1.Size = new Size(250, 121);
            pictureBox1.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox1.TabIndex = 54;
            pictureBox1.TabStop = false;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Font = new Font("Arial Black", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label1.ForeColor = SystemColors.ButtonHighlight;
            label1.Location = new Point(77, 187);
            label1.Name = "label1";
            label1.Size = new Size(173, 33);
            label1.TabIndex = 2;
            label1.Text = "Users Table";
            label1.Click += label1_Click;
            // 
            // label4
            // 
            label4.AutoSize = true;
            label4.Font = new Font("Arial Black", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label4.ForeColor = SystemColors.ButtonHighlight;
            label4.Location = new Point(77, 476);
            label4.Name = "label4";
            label4.Size = new Size(154, 33);
            label4.TabIndex = 5;
            label4.Text = "Blog Table";
            label4.Click += label4_Click;
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.Font = new Font("Arial Black", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label2.ForeColor = SystemColors.ControlLightLight;
            label2.Location = new Point(77, 286);
            label2.Name = "label2";
            label2.Size = new Size(163, 33);
            label2.TabIndex = 3;
            label2.Text = "Price Table";
            label2.Click += label2_Click;
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.Font = new Font("Arial Black", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label3.ForeColor = SystemColors.ButtonHighlight;
            label3.Location = new Point(73, 375);
            label3.Name = "label3";
            label3.Size = new Size(204, 33);
            label3.TabIndex = 4;
            label3.Text = "Courses Table";
            label3.Click += label3_Click;
            // 
            // pictureBox4
            // 
            pictureBox4.Image = (Image)resources.GetObject("pictureBox4.Image");
            pictureBox4.Location = new Point(15, 364);
            pictureBox4.Name = "pictureBox4";
            pictureBox4.Size = new Size(56, 55);
            pictureBox4.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox4.TabIndex = 2;
            pictureBox4.TabStop = false;
            // 
            // pictureBox5
            // 
            pictureBox5.Image = (Image)resources.GetObject("pictureBox5.Image");
            pictureBox5.Location = new Point(15, 460);
            pictureBox5.Name = "pictureBox5";
            pictureBox5.Size = new Size(56, 58);
            pictureBox5.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox5.TabIndex = 2;
            pictureBox5.TabStop = false;
            // 
            // label5
            // 
            label5.AutoSize = true;
            label5.Font = new Font("Arial Black", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label5.ForeColor = SystemColors.ButtonHighlight;
            label5.Location = new Point(77, 649);
            label5.Name = "label5";
            label5.Size = new Size(118, 33);
            label5.TabIndex = 8;
            label5.Text = "Log Out";
            label5.Click += label5_Click;
            // 
            // pictureBox6
            // 
            pictureBox6.Image = (Image)resources.GetObject("pictureBox6.Image");
            pictureBox6.Location = new Point(15, 642);
            pictureBox6.Name = "pictureBox6";
            pictureBox6.Size = new Size(56, 52);
            pictureBox6.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox6.TabIndex = 2;
            pictureBox6.TabStop = false;
            // 
            // pictureBox3
            // 
            pictureBox3.BackColor = Color.Transparent;
            pictureBox3.Image = (Image)resources.GetObject("pictureBox3.Image");
            pictureBox3.Location = new Point(15, 271);
            pictureBox3.Name = "pictureBox3";
            pictureBox3.Size = new Size(56, 57);
            pictureBox3.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox3.TabIndex = 2;
            pictureBox3.TabStop = false;
            // 
            // pictureBox2
            // 
            pictureBox2.BackColor = Color.Transparent;
            pictureBox2.Image = (Image)resources.GetObject("pictureBox2.Image");
            pictureBox2.Location = new Point(15, 174);
            pictureBox2.Name = "pictureBox2";
            pictureBox2.Size = new Size(56, 55);
            pictureBox2.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox2.TabIndex = 7;
            pictureBox2.TabStop = false;
            // 
            // panel5
            // 
            panel5.BackColor = Color.Indigo;
            panel5.Controls.Add(pictureBox7);
            panel5.Controls.Add(label6);
            panel5.Location = new Point(0, 552);
            panel5.Name = "panel5";
            panel5.Size = new Size(277, 58);
            panel5.TabIndex = 58;
            // 
            // pictureBox7
            // 
            pictureBox7.Image = (Image)resources.GetObject("pictureBox7.Image");
            pictureBox7.Location = new Point(15, 0);
            pictureBox7.Name = "pictureBox7";
            pictureBox7.Size = new Size(56, 58);
            pictureBox7.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox7.TabIndex = 55;
            pictureBox7.TabStop = false;
            // 
            // label6
            // 
            label6.AutoSize = true;
            label6.Font = new Font("Arial Black", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label6.ForeColor = SystemColors.ButtonHighlight;
            label6.Location = new Point(77, 15);
            label6.Name = "label6";
            label6.Size = new Size(126, 33);
            label6.TabIndex = 56;
            label6.Text = "SEARCH";
            // 
            // panel6
            // 
            panel6.BackColor = Color.Indigo;
            panel6.Controls.Add(label8);
            panel6.Dock = DockStyle.Top;
            panel6.Location = new Point(277, 36);
            panel6.Name = "panel6";
            panel6.Size = new Size(1021, 72);
            panel6.TabIndex = 69;
            // 
            // label8
            // 
            label8.AutoSize = true;
            label8.Font = new Font("Arial Black", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label8.ForeColor = SystemColors.ButtonHighlight;
            label8.Location = new Point(288, 18);
            label8.Name = "label8";
            label8.Size = new Size(309, 33);
            label8.TabIndex = 0;
            label8.Text = "système de recherche";
            // 
            // panel3
            // 
            panel3.BackColor = Color.Indigo;
            panel3.Dock = DockStyle.Right;
            panel3.Location = new Point(1287, 108);
            panel3.Name = "panel3";
            panel3.Size = new Size(11, 649);
            panel3.TabIndex = 70;
            // 
            // search
            // 
            AutoScaleDimensions = new SizeF(10F, 25F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(1298, 767);
            Controls.Add(panel3);
            Controls.Add(panel6);
            Controls.Add(panel1);
            Controls.Add(panel4);
            Controls.Add(button7);
            Controls.Add(label9);
            Controls.Add(dataGridView1);
            Controls.Add(label7);
            Controls.Add(label10);
            Controls.Add(comboBox1);
            Controls.Add(textBox1);
            Controls.Add(panel2);
            FormBorderStyle = FormBorderStyle.None;
            Name = "search";
            StartPosition = FormStartPosition.CenterScreen;
            Text = "search";
            ((System.ComponentModel.ISupportInitialize)dataGridView1).EndInit();
            panel4.ResumeLayout(false);
            panel1.ResumeLayout(false);
            panel1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)pictureBox1).EndInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox4).EndInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox5).EndInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox6).EndInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox3).EndInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox2).EndInit();
            panel5.ResumeLayout(false);
            panel5.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)pictureBox7).EndInit();
            panel6.ResumeLayout(false);
            panel6.PerformLayout();
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Panel panel2;
        private Button button2;
        private Button button6;
        private TextBox textBox1;
        private ComboBox comboBox1;
        private Label label10;
        private Label label7;
        private DataGridView dataGridView1;
        private Label label9;
        private Button button7;
        private Panel panel4;
        private Panel panel1;
        private PictureBox pictureBox1;
        private Label label1;
        private Label label4;
        private Label label2;
        private Label label3;
        private PictureBox pictureBox4;
        private PictureBox pictureBox5;
        private Label label5;
        private PictureBox pictureBox6;
        private PictureBox pictureBox3;
        private PictureBox pictureBox2;
        private Panel panel5;
        private PictureBox pictureBox7;
        private Label label6;
        private Panel panel6;
        private Label label8;
        private Panel panel3;
    }
}