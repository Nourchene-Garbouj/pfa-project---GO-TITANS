using Microsoft.VisualBasic.Logging;
using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Runtime.InteropServices;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WinFormsApp2
{
    public partial class search : Form
    {
        MySqlConnection con = new MySqlConnection("database=pfa;server=localhost;username=root;pwd=");
        MySqlCommand cmd;
        MySqlDataAdapter adapt;
        public search()
        {
            InitializeComponent();
        }

        private void label6_Click(object sender, EventArgs e)
        {

        }

        private void panel4_Paint(object sender, PaintEventArgs e)
        {

        }

        [DllImport("user32.DLL", EntryPoint = "ReleaseCapture")]
        private extern static void ReleaseCapture();
        [DllImport("user32.DLL", EntryPoint = "SendMessage")]
        private extern static void SendMessage(System.IntPtr one, int two, int three, int four);
        private void panel4_MouseDown(object sender, MouseEventArgs e)
        {
            ReleaseCapture();
            SendMessage(Handle, 0x112, 0xf012, 0);
        }

        private void button2_Click(object sender, EventArgs e)
        {
            WindowState = FormWindowState.Minimized;
        }

        private void button6_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void label1_Click(object sender, EventArgs e)
        {
            users_table form = new users_table();
            this.Hide();
            form.Show();
        }

        private void label2_Click(object sender, EventArgs e)
        {
            tarifs form = new tarifs();
            this.Hide();
            form.Show();
        }

        private void label3_Click(object sender, EventArgs e)
        {
            cours form = new cours();
            this.Hide();
            form.Show();
        }

        private void label4_Click(object sender, EventArgs e)
        {
            blog form = new blog();
            this.Hide();
            form.Show();
        }

        private void label5_Click(object sender, EventArgs e)
        {
            login form2 = new login();

            this.Hide();

            form2.Show();
        }


        private void button7_Click(object sender, EventArgs e)
        {
            // Retrieve search text and selected table name
            string searchTerm = textBox1.Text.Trim();
            string selectedTable = comboBox1.SelectedItem?.ToString();

            // Check if search term or selected table is empty
            if (string.IsNullOrEmpty(searchTerm) || string.IsNullOrEmpty(selectedTable))
            {
                MessageBox.Show("Please enter a search term and select a table.");
                return;
            }

            // Perform search based on the selected table
            string query = "";
            if (selectedTable == "cours")
            {
                query = "SELECT * FROM cours WHERE nom LIKE @searchTerm";
            }
            else if (selectedTable == "users")
            {
                query = "SELECT * FROM users WHERE name LIKE @searchTerm";
            }
            else
            {
                MessageBox.Show("Invalid table selected.");
                return;
            }

            try
            {
                // Execute the query
                con.Open();
                MySqlCommand command = new MySqlCommand(query, con);
                command.Parameters.AddWithValue("@searchTerm", "%" + searchTerm + "%");

                DataTable dt = new DataTable();
                MySqlDataAdapter adapt = new MySqlDataAdapter(command);
                adapt.Fill(dt);

                // Display results in dataGridView1
                dataGridView1.DataSource = dt;
                dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message);
            }
            finally
            {
                con.Close();
            }
        }

        private void label1_Click_1(object sender, EventArgs e)
        {

        }

        private void label1_Click_2(object sender, EventArgs e)
        {

        }
    }
}
