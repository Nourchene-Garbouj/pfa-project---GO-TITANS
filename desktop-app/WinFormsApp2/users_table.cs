using MySql.Data.MySqlClient;
using Mysqlx.Crud;
using MySqlX.XDevAPI;
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
    public partial class users_table : Form
    {

        MySqlConnection con = new MySqlConnection("database=pfa;server=localhost;username=root;pwd=");
        MySqlCommand cmd;
        MySqlDataAdapter adapt;
        public users_table()
        {
            InitializeComponent();
            DisplayData();
        }
        // Displays the data in Data Grid View  
        private void DisplayData()
        {
            con.Open();
            DataTable dt = new DataTable();
            adapt = new MySqlDataAdapter("select * from users", con);
            adapt.Fill(dt);
            dataGridView1.DataSource = dt;
            dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
            con.Close();
        }

        private void label6_Click(object sender, EventArgs e)
        {

        }

        private void label11_Click(object sender, EventArgs e)
        {
        }

        private void label13_Click(object sender, EventArgs e)
        {

            tarifs form2 = new tarifs();

            this.Hide();

            form2.Show();
        }

        private void label14_Click(object sender, EventArgs e)
        {

            cours form2 = new cours();

            this.Hide();

            form2.Show();
        }

        private void label12_Click(object sender, EventArgs e)
        {

            blog form2 = new blog();

            this.Hide();

            form2.Show();
        }

        private void label15_Click(object sender, EventArgs e)
        {

            login form2 = new login();

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

        private void panel6_Paint(object sender, PaintEventArgs e)
        {

        }

        private void label16_Click(object sender, EventArgs e)
        {
            search form = new search();
            this.Hide();
            form.Show();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
        //function to add a user based on the type
        private void button3_Click(object sender, EventArgs e)
        {
            string nom = textBox1.Text;
            string email = textBox2.Text;
            string password = textBox3.Text;
            string type = comboBox1.SelectedItem?.ToString();

            // Check if any field is empty
            if (string.IsNullOrEmpty(nom) || string.IsNullOrEmpty(email) ||
                string.IsNullOrEmpty(password) || comboBox1.SelectedItem == null)
            {
                MessageBox.Show("All fields are required. Please fill in all the fields.");
                return;
            }


            // Check if type is null
            if (type == null)
            {
                MessageBox.Show("Please select a type from the dropdown.");
                return;
            }
            // validate email
            if (!IsValidEmail(email))
            {
                MessageBox.Show("Email is not valid.");
                return;
            }

            // Check if user email exists in the database
            if (emailExists(email))
            {
                MessageBox.Show("Email already exists in the database. Please enter another email.");
                return;
            }

            // Insert new user into the database

            con.Open();
            MySqlCommand command = new MySqlCommand();
            command.Connection = con;

            if (type == "admin")
            {
                string adminQuery = "INSERT INTO users (name, email, password, typee) VALUES (@nom, @email, @password, @type)";
                command.CommandText = adminQuery;
                command.Parameters.AddWithValue("@nom", nom);
                command.Parameters.AddWithValue("@email", email);
                command.Parameters.AddWithValue("@password", password);
                command.Parameters.AddWithValue("@type", type);
                command.ExecuteNonQuery();

                // Now insert into the 'admin' table
                string adminIdQuery = "INSERT INTO admin (user_id) VALUES (LAST_INSERT_ID())";
                command.CommandText = adminIdQuery;
                command.ExecuteNonQuery();
            }
            else if (type == "client")
            {
                string clientQuery = "INSERT INTO users (name, email, password, typee) VALUES (@nom, @email, @password, @type)";
                command.CommandText = clientQuery;
                command.Parameters.AddWithValue("@nom", nom);
                command.Parameters.AddWithValue("@email", email);
                command.Parameters.AddWithValue("@password", password);
                command.Parameters.AddWithValue("@type", type);
                command.ExecuteNonQuery();

                // Now insert into the 'clients' table
                string clientIdQuery = "INSERT INTO clients (user_id) VALUES (LAST_INSERT_ID())";
                command.CommandText = clientIdQuery;
                command.ExecuteNonQuery();
            }
            else if (type == "trainer")
            {
                string trainerQuery = "INSERT INTO users (name, email, password, typee) VALUES (@nom, @email, @password, @type)";
                command.CommandText = trainerQuery;
                command.Parameters.AddWithValue("@nom", nom);
                command.Parameters.AddWithValue("@email", email);
                command.Parameters.AddWithValue("@password", password);
                command.Parameters.AddWithValue("@type", type);
                command.ExecuteNonQuery();

                // Now insert into the 'trainers' table
                string trainerIdQuery = "INSERT INTO trainers (user_id) VALUES (LAST_INSERT_ID())";
                command.CommandText = trainerIdQuery;
                command.ExecuteNonQuery();
            }

            MessageBox.Show("New user added successfully.");
            // Refresh DataGridView to display the new user
            con.Close();
            DisplayData();


        }

        // funcion to check if the trainer ID exists in the database
        private bool emailExists(string email)
        {
            try
            {
                con.Open();
                string query = "SELECT COUNT(*) FROM users WHERE email = @email";
                MySqlCommand command = new MySqlCommand(query, con);
                command.Parameters.AddWithValue("@email", email);

                int count = Convert.ToInt32(command.ExecuteScalar());
                return count > 0;
            }
            catch (Exception ex)
            {
                MessageBox.Show($"Error checking trainer ID: {ex.Message}");
                return false;
            }
            finally
            {
                con.Close();
            }
        }
        // function to validate email
        private bool IsValidEmail(string email)
        {
            try
            {
                var addr = new System.Net.Mail.MailAddress(email);
                return addr.Address == email;
            }
            catch
            {
                return false;
            }
        }
        //function to delete a user
        private void button1_Click(object sender, EventArgs e)
        {
            // Check if a user is selected in the DataGridView
            if (dataGridView1.SelectedRows.Count == 0)
            {
                MessageBox.Show("Please select a User to delete.");
                return;
            }

            // Retrieve the selected user's ID from the DataGridView
            int userId = Convert.ToInt32(dataGridView1.SelectedRows[0].Cells["user_id"].Value);

            // Confirm deletion with the user
            DialogResult result = MessageBox.Show("Are you sure you want to delete this user?", "Confirmation", MessageBoxButtons.YesNo, MessageBoxIcon.Question);
            if (result == DialogResult.Yes)
            {
                // Delete the selected user from the database

                con.Open();
                string query = "DELETE FROM users WHERE user_id = @userId";
                MySqlCommand command = new MySqlCommand(query, con);
                command.Parameters.AddWithValue("@userId", userId);

                int rowsAffected = command.ExecuteNonQuery();
                if (rowsAffected > 0)
                {
                    MessageBox.Show("User deleted successfully.");
                    // Refresh DataGridView to reflect the deletion
                    con.Close();
                    DisplayData();
                }
                else
                {
                    MessageBox.Show("Failed to delete User.");
                }
            }
        }
        //function to update a user
        private void button2_Click(object sender, EventArgs e)
        {
            // Retrieve data from text boxes
            string name = textBox1.Text;
            string email = textBox2.Text;
            string password = textBox3.Text;

            // Check if a user is selected in the DataGridView
            if (dataGridView1.SelectedRows.Count == 0)
            {
                MessageBox.Show("Please select a user to update.");
                return;
            }
            if (string.IsNullOrEmpty(name) || string.IsNullOrEmpty(email) || string.IsNullOrEmpty(password))
            {
                MessageBox.Show("All fields are required. Please fill in all the fields.");
                return;
            }
            // Retrieve the selected user's ID from the DataGridView
            int userId = Convert.ToInt32(dataGridView1.SelectedRows[0].Cells["user_id"].Value);


            // Update user information in the database excluding the "type" field
            string updateQuery = "UPDATE users SET name = @name, email = @email, "
                               + "password = @password WHERE user_id = @userId";
            MySqlCommand updateCommand = new MySqlCommand(updateQuery, con);
            updateCommand.Parameters.AddWithValue("@name", name);
            updateCommand.Parameters.AddWithValue("@email", email);
            updateCommand.Parameters.AddWithValue("@password", password);
            updateCommand.Parameters.AddWithValue("@userId", userId);

          
                con.Open();
                int rowsAffected = updateCommand.ExecuteNonQuery();
                if (rowsAffected > 0)
                {
                    MessageBox.Show("User updated successfully.");
                // Refresh DataGridView to reflect the changes
                con.Close();
                DisplayData();
                    
                }
                else
                {
                    MessageBox.Show("Failed to update user.");
                }
           
        }




        }
}
