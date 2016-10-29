using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0705
{
    class Program
    {
        static void Main(string[] args)
        {
            // Create an email
            Email myEmail = new Email();

            // Create attachables
            PDF myPDF = new PDF(5, "report");
            PDF myPDF2 = new PDF(12, "cv");
            Text myText = new Text(3, "E-mail text...");
            Image myImage = new Image(15, "Picture of me...");

            // Attach attachables
            myEmail.Attached.Add(myPDF);
            myEmail.Attached.Add(myPDF2);
            myEmail.Attached.Add(myText);
            myEmail.Attached.Add(myImage);

            // Send e-mail
            myEmail.Send();
        }
    }
}
