using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Reflection.Metadata;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Runtime.InteropServices;
using MySql.Data.MySqlClient;
using BCrypt.Net;
using static System.Windows.Forms.VisualStyles.VisualStyleElement.ListView;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;

namespace WinFormsApp2
{
    public partial class blog : Form
    {
        MySqlConnection con = new MySqlConnection("database=pfa;server=localhost;username=root;pwd=");
        MySqlCommand cmd;
        MySqlDataAdapter adapt;
        public blog()
        {
            InitializeComponent();
            //calling to a function to display in the richtext box the articles from data base
            DisplayArticle(1, richTextBox1);
            DisplayArticle(2, richTextBox2);
            DisplayArticle(3, richTextBox3);
        }
        private void DisplayArticle(int articleId, RichTextBox richTextBox)
        {
            try
            {
                con.Open();
                string query = "SELECT article FROM blog WHERE article_id = @id";
                MySqlCommand command = new MySqlCommand(query, con);
                command.Parameters.AddWithValue("@id", articleId);

                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    if (reader.Read())
                    {
                        richTextBox.Text = reader["article"].ToString();
                    }
                    else
                    {
                        MessageBox.Show($"No data found for article ID: {articleId}");
                    }
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show($"Error fetching article: {ex.Message}");
            }
            finally
            {
                con.Close();
            }
        }



    private void richTextBox2_TextChanged(object sender, EventArgs e)
        {

        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void panel3_Paint(object sender, PaintEventArgs e)
        {

        }
        //links to the other pages
        private void label1_Click(object sender, EventArgs e)
        {
            users_table form = new users_table();
            this.Hide();
            form.Show();
        }

        private void label2_Click_1(object sender, EventArgs e)
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

        private void label4_Click_1(object sender, EventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

            login form = new login();
            this.Hide();
            form.Show();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void button4_Click(object sender, EventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            WindowState = FormWindowState.Minimized;
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

        private void label7_Click(object sender, EventArgs e)
        {
            search form = new search();
            this.Hide();
            form.Show();
        }
        //calling a function to update whatever change in the reach text box
        private void button2_Click(object sender, EventArgs e)
        {
            UpdateArticle(1, richTextBox1.Text);
            UpdateArticle(2, richTextBox2.Text);
            UpdateArticle(3, richTextBox3.Text);
        }

        private void UpdateArticle(int articleId, string newText)
        {
            try
            {
                con.Open();
                string query = "UPDATE blog SET article = @newText WHERE article_id = @id";
                MySqlCommand command = new MySqlCommand(query, con);
                command.Parameters.AddWithValue("@newText", newText);
                command.Parameters.AddWithValue("@id", articleId);

                int rowsAffected = command.ExecuteNonQuery();
                if (rowsAffected > 0)
                {
                    MessageBox.Show($"Article {articleId} updated successfully.");
                }
                else
                {
                    MessageBox.Show($"Failed to update article {articleId}.");
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show($"Error updating article {articleId}: {ex.Message}");
            }
            finally
            {
                con.Close();
            }
        }



    }
}
