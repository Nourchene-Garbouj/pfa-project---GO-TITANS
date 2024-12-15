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
using static System.Windows.Forms.VisualStyles.VisualStyleElement;

namespace WinFormsApp2
{
    public partial class tarifs : Form
    {
        MySqlConnection con = new MySqlConnection("database=pfa;server=localhost;username=root;pwd=");
        MySqlCommand cmd;
        MySqlDataAdapter adapt;
        public tarifs()
        {
            InitializeComponent();
            DisplayData();
        }
        // Displays the data in Data Grid View  
        private void DisplayData()
        {
            con.Open();
            DataTable dt = new DataTable();
            adapt = new MySqlDataAdapter("select * from tarifs", con);
            adapt.Fill(dt);
            dataGridView1.DataSource = dt;
            dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
            con.Close();
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label6_Click(object sender, EventArgs e)
        {

        }

        private void gotitans_Load(object sender, EventArgs e)
        {

        }
        //links to the other pages
        private void label8_Click(object sender, EventArgs e)
        {

            users_table form2 = new users_table();

            this.Hide();

            form2.Show();
        }

        private void label12_Click(object sender, EventArgs e)
        {
        }

        private void label13_Click(object sender, EventArgs e)
        {

            cours form2 = new cours();

            this.Hide();

            form2.Show();
        }

        private void label11_Click(object sender, EventArgs e)
        {

            blog form2 = new blog();

            this.Hide();

            form2.Show();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            WindowState = FormWindowState.Minimized;
        }

        private void button6_Click(object sender, EventArgs e)
        {
            Application.Exit();
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

        private void label15_Click(object sender, EventArgs e)
        {
            search form = new search();
            this.Hide();
            form.Show();
        }

        private void label14_Click(object sender, EventArgs e)
        {
            login form2 = new login();

            this.Hide();

            form2.Show();
        }
        //function to add a tarif
        private void button3_Click(object sender, EventArgs e)
        {
            string period = textBox1.Text;
            string tarif = textBox2.Text;

            // Check if any field is empty
            if (string.IsNullOrEmpty(period) || string.IsNullOrEmpty(tarif))
            {
                MessageBox.Show("All fields are required. Please fill in all the fields.");
                return;
            }

            // Insert new tarif into the database

            con.Open();
            MySqlCommand command = new MySqlCommand();
            command.Connection = con;

            string Query = "INSERT INTO tarifs (period,`Tarifs par personne`,admin_id) VALUES (@period, @tarif, @id)";
            command.CommandText = Query;
            command.Parameters.AddWithValue("@period", period);
            command.Parameters.AddWithValue("@tarif", tarif);
            command.Parameters.AddWithValue("@id", 2);

            command.ExecuteNonQuery();

            MessageBox.Show("New tarif added successfully.");
            // Refresh DataGridView to display the new tarif
            con.Close();
            DisplayData();
        }
        //function to delete a tarif
        private void button1_Click(object sender, EventArgs e)
        {
            // Check if the tarif is selected in the DataGridView
            if (dataGridView1.SelectedRows.Count == 0)
            {
                MessageBox.Show("Please select a tarif to delete.");
                return;
            }

            // Retrieve the selected tarif ID from the DataGridView
            int Id = Convert.ToInt32(dataGridView1.SelectedRows[0].Cells["Id"].Value);

            // Confirm deletion with the user
            DialogResult result = MessageBox.Show("Are you sure you want to delete this tarif?", "Confirmation", MessageBoxButtons.YesNo, MessageBoxIcon.Question);
            if (result == DialogResult.Yes)
            {
                // Delete the selected tarif from the database

                con.Open();
                string query = "DELETE FROM tarifs WHERE Id = @Id";
                MySqlCommand command = new MySqlCommand(query, con);
                command.Parameters.AddWithValue("@Id", Id);

                int rowsAffected = command.ExecuteNonQuery();
                if (rowsAffected > 0)
                {
                    MessageBox.Show("tarif deleted successfully.");
                    // Refresh DataGridView to reflect the deletion
                    con.Close();
                    DisplayData();
                }
                else
                {
                    MessageBox.Show("Failed to delete tarif.");
                }
            }
        }
        //function to update tarif
        private void button2_Click(object sender, EventArgs e)
        {
            // Retrieve data from text boxes
            string period = textBox1.Text;
            string tarif = textBox2.Text;

            // Check if the tarif is selected in the DataGridView
            if (dataGridView1.SelectedRows.Count == 0)
            {
                MessageBox.Show("Please select a tarif to update.");
                return;
            }
            // Check if any field is empty
            if (string.IsNullOrEmpty(period) || string.IsNullOrEmpty(tarif))
            {
                MessageBox.Show("All fields are required. Please fill in all the fields.");
                return;
            }
            // Retrieve the selected tarif ID from the DataGridView
            int Id = Convert.ToInt32(dataGridView1.SelectedRows[0].Cells["Id"].Value);


            // Update tarif information in the database
            string updateQuery = "UPDATE tarifs SET period = @period, `Tarifs par personne` = @tarif WHERE Id = @Id";
            MySqlCommand updateCommand = new MySqlCommand(updateQuery, con);
            updateCommand.Parameters.AddWithValue("@period", period);
            updateCommand.Parameters.AddWithValue("@tarif", tarif);
            updateCommand.Parameters.AddWithValue("@Id", Id);
           


            con.Open();
            int rowsAffected = updateCommand.ExecuteNonQuery();
            if (rowsAffected > 0)
            {
                MessageBox.Show("tarif updated successfully.");
                // Refresh DataGridView to reflect the changes
                con.Close();
                DisplayData();

            }
            else
            {
                MessageBox.Show("Failed to update tarif.");
            }
        }
    }
}
