using System.Runtime.InteropServices;
using MySql.Data.MySqlClient;
using BCrypt.Net;
namespace WinFormsApp2
{
    public partial class login : Form
    {
        public login()
        {
            InitializeComponent();
        }
        [DllImport("user32.DLL", EntryPoint = "ReleaseCapture")]
        private extern static void ReleaseCapture();
        [DllImport("user32.DLL", EntryPoint = "SendMessage")]
        private extern static void SendMessage(System.IntPtr one, int two, int three, int four);

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {
          
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

        }

        private void panel4_MouseDown(object sender, MouseEventArgs e)
        {
            ReleaseCapture();
            SendMessage(Handle, 0x112, 0xf012, 0);
        }

        private void button2_MouseClick(object sender, MouseEventArgs e)
        {
            Application.Exit();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            WindowState = FormWindowState.Minimized;
        }

        private void button4_Click(object sender, EventArgs e)
        {
            if (WindowState == FormWindowState.Normal)
            {
                WindowState = FormWindowState.Maximized;
            }
            else
            {
                WindowState = FormWindowState.Normal;
            }
        }

        private void pictureBox1_Click_1(object sender, EventArgs e)
        {

        }

        private void login_Load(object sender, EventArgs e)
        {

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            string email = textBox1.Text;
            string password = textBox2.Text;
            string type = "admin";
            if (string.IsNullOrEmpty(email) || string.IsNullOrEmpty(password))
            {
                MessageBox.Show("All fields are required.", "Error");
            }
            else if (!IsValidEmail(email))
            {
                MessageBox.Show("Email is not valid.", "Error");
            }
            else if (check_password(email, password) == true)
            {


                users_table form2 = new users_table();

                this.Hide();

                form2.Show();

            }


        }


        //function to validate email
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
        //function to assume that the email exist and check the password
        private bool check_password(string email, string password)
        {
            string connectionString = "database=pfa;server=localhost;username=root;pwd=";
            MySqlConnection connection = new MySqlConnection(connectionString);
            connection.Open();


            string query = "SELECT * FROM `users` WHERE `email`=@Email AND `typee`='admin';";
            MySqlCommand command = new MySqlCommand(query, connection);
            command.Parameters.AddWithValue("@Email", email);

            MySqlDataReader reader = command.ExecuteReader();
            if (reader.Read())
            {
                string dbPassword = reader["password"].ToString();
                if (dbPassword == password)
                {
                    int id = Convert.ToInt32(reader["user_id"]);
                    string name = reader["name"].ToString();

                    reader.Close();
                    connection.Close();
                    return true;
                }
                else
                {
                    reader.Close();
                    connection.Close();
                    return false;
                }
            }

            reader.Close();
            connection.Close();
            return false;

        }

        private void button2_Click(object sender, EventArgs e)
        {

        }

        private void panel4_Paint(object sender, PaintEventArgs e)
        {

        }
    }
}
