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
    public partial class cours : Form
    {
        MySqlConnection con = new MySqlConnection("database=pfa;server=localhost;username=root;pwd=");
        MySqlCommand cmd;
        MySqlDataAdapter adapt;
        public cours()
        {
            InitializeComponent();
            DisplayData();
        }
        // Displays the data in the Data Grid
        private void DisplayData()
        {
            con.Open();
            DataTable dt = new DataTable();
            adapt = new MySqlDataAdapter("select * from cours", con);
            adapt.Fill(dt);
            dataGridView1.DataSource = dt;
            dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
            con.Close();
        }

        private void cours_Load(object sender, EventArgs e)
        {

        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }
        //links to other pages
        private void label11_Click(object sender, EventArgs e)
        {

            users_table form2 = new users_table();
            this.Hide();
            form2.Show();
        }

        private void label14_Click(object sender, EventArgs e)
        {

            tarifs form2 = new tarifs();

            this.Hide();

            form2.Show();
        }

        private void label15_Click(object sender, EventArgs e)
        {
        }

        private void label12_Click(object sender, EventArgs e)
        {

            blog form2 = new blog();

            this.Hide();

            form2.Show();
        }

        private void label16_Click(object sender, EventArgs e)
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

        private void label17_Click(object sender, EventArgs e)
        {
            search form = new search();
            this.Hide();
            form.Show();
        }

        //funcrion to add a course
        private void button3_Click(object sender, EventArgs e)
        {

            string nomDeCour = textBox1.Text;
            string jour = textBox2.Text;
            string horaire = textBox3.Text;
            string nbMaximaleText = textBox4.Text;
            string trainerIdText = textBox5.Text;
            int nbact = 0;

            // Check if any field is empty
            if (string.IsNullOrEmpty(nomDeCour) || string.IsNullOrEmpty(jour) ||
                string.IsNullOrEmpty(horaire) || string.IsNullOrEmpty(nbMaximaleText) ||
                string.IsNullOrEmpty(trainerIdText))
            {
                MessageBox.Show("All fields are required. Please fill in all the fields.");
                return;
            }

            // assuming that nb maximal it's an integer
            int nbMaximale;
            if (!int.TryParse(nbMaximaleText, out nbMaximale))
            {
                MessageBox.Show("Invalid value for 'Nombre Maximale'. Please enter a valid integer.");
                return;
            }


            int trainerId;
            if (!int.TryParse(trainerIdText, out trainerId))
            {
                MessageBox.Show("Invalid value for 'Trainer ID'. Please enter a valid integer.");
                return;
            }

            // Check if trainer ID exists in the database
            if (!TrainerExists(trainerId))
            {
                MessageBox.Show("Trainer ID does not exist in the database. Please enter a valid Trainer ID.");
                return;
            }

            // Insert new course into the database

            con.Open();
            string query = "INSERT INTO cours (nom, jour, horaire, `nb max`, `nb act`, trainer_id) VALUES (@nomDeCour, @jour, @horaire, @nbMaximale, @nbact, @trainerId)";
            MySqlCommand command = new MySqlCommand(query, con);
            command.Parameters.AddWithValue("@nomDeCour", nomDeCour);
            command.Parameters.AddWithValue("@jour", jour);
            command.Parameters.AddWithValue("@horaire", horaire);
            command.Parameters.AddWithValue("@nbMaximale", nbMaximale);
            command.Parameters.AddWithValue("@nbact", nbact);
            command.Parameters.AddWithValue("@trainerId", trainerId);

            int rowsAffected = command.ExecuteNonQuery();
            if (rowsAffected > 0)
            {
                MessageBox.Show("New course added successfully.");
                // Refresh DataGridView to display the new course
                con.Close();
                DisplayData();

            }
            else
            {
                MessageBox.Show("Failed to add new course.");
            }


        }


        //function to check if the trainer ID exists in the database
        private bool TrainerExists(int trainerId)
        {
            try
            {
                con.Open();
                string query = "SELECT COUNT(*) FROM trainers WHERE trainer_id = @trainerId";
                MySqlCommand command = new MySqlCommand(query, con);
                command.Parameters.AddWithValue("@trainerId", trainerId);

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

        //function to update a course
        private void button2_Click(object sender, EventArgs e)
        {
            string nomDeCour = textBox1.Text;
            string jour = textBox2.Text;
            string horaire = textBox3.Text;
            string nbMaximaleText = textBox4.Text;
            string trainerIdText = textBox5.Text;
            int nbact = 0;

            // Check if any field is empty
            if (string.IsNullOrEmpty(nomDeCour) || string.IsNullOrEmpty(jour) ||
                string.IsNullOrEmpty(horaire) || string.IsNullOrEmpty(nbMaximaleText) ||
                string.IsNullOrEmpty(trainerIdText))
            {
                MessageBox.Show("All fields are required. Please fill in all the fields.");
                return;
            }

            // Validate nbMaximale
            int nbMaximale;
            if (!int.TryParse(nbMaximaleText, out nbMaximale))
            {
                MessageBox.Show("Invalid value for 'Nombre Maximale'. Please enter a valid integer.");
                return;
            }

            // Validate trainer ID
            int trainerId;
            if (!int.TryParse(trainerIdText, out trainerId))
            {
                MessageBox.Show("Invalid value for 'Trainer ID'. Please enter a valid integer.");
                return;
            }

            // Check if trainer ID exists in the database
            if (!TrainerExists(trainerId))
            {
                MessageBox.Show("Trainer ID does not exist in the database. Please enter a valid Trainer ID.");
                return;
            }

            // Check if a course is selected in the DataGridView
            if (dataGridView1.SelectedRows.Count == 0)
            {
                MessageBox.Show("Please select a course to update.");
                return;
            }

            // Retrieve the selected course's ID from the DataGridView
            int courseId = Convert.ToInt32(dataGridView1.SelectedRows[0].Cells["cour_id"].Value);

            // Update the selected course in the database

            con.Open();
            string query = "UPDATE cours SET nom = @nomDeCour, jour = @jour, horaire = @horaire, `nb max` = @nbMaximale, `nb act` = @nbact, trainer_id = @trainerId WHERE cour_id = @courseId";
            MySqlCommand command = new MySqlCommand(query, con);
            command.Parameters.AddWithValue("@nomDeCour", nomDeCour);
            command.Parameters.AddWithValue("@jour", jour);
            command.Parameters.AddWithValue("@horaire", horaire);
            command.Parameters.AddWithValue("@nbMaximale", nbMaximale);
            command.Parameters.AddWithValue("@nbact", nbact);
            command.Parameters.AddWithValue("@trainerId", trainerId);
            command.Parameters.AddWithValue("@courseId", courseId);

            int rowsAffected = command.ExecuteNonQuery();
            if (rowsAffected > 0)
            {
                MessageBox.Show("Course updated successfully.");
                // Refresh DataGridView to display the updated course
                con.Close();
                DisplayData();
            }
            else
            {
                MessageBox.Show("Failed to update course.");
            }


        }
        //function to delete a course
        private void button1_Click(object sender, EventArgs e)
        {
            // Check if a course is selected in the DataGridView
            if (dataGridView1.SelectedRows.Count == 0)
            {
                MessageBox.Show("Please select a course to delete.");
                return;
            }

            // Retrieve the selected course's ID from the DataGridView
            int courseId = Convert.ToInt32(dataGridView1.SelectedRows[0].Cells["cour_id"].Value);

            // Confirm deletion with the user
            DialogResult result = MessageBox.Show("Are you sure you want to delete this course?", "Confirmation", MessageBoxButtons.YesNo, MessageBoxIcon.Question);
            if (result == DialogResult.Yes)
            {
                // Delete the selected course from the database

                con.Open();
                string query = "DELETE FROM cours WHERE cour_id = @courseId";
                MySqlCommand command = new MySqlCommand(query, con);
                command.Parameters.AddWithValue("@courseId", courseId);

                int rowsAffected = command.ExecuteNonQuery();
                if (rowsAffected > 0)
                {
                    MessageBox.Show("Course deleted successfully.");
                    // Refresh DataGridView to reflect the deletion
                    con.Close();
                    DisplayData();
                }
                else
                {
                    MessageBox.Show("Failed to delete course.");
                }
            }
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
    }
}
