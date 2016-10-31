using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_07_05
{
    class Program
    {
        static void Main(string[] args)
        {
            //I'm really tired to make comments right now. maybe next time. Sorry :(

            Email myEmail = new Email();
            

            PDF aPDF = new PDF(10, "idunno");
            PDF anotherPDF = new PDF(12, "another idunno");
            Image dasImage = new Image(100, "cat picture");
            Text myText = new Text(2, "Hello World");

            myEmail.Attached.Add(aPDF);
            myEmail.Attached.Add(anotherPDF);
            myEmail.Attached.Add(dasImage);
            myEmail.Attached.Add(myText);

            myEmail.Send();

            Console.ReadKey();
        }

        interface IAttachable
        {
            string Type { get; set; }
            int Size { get; set; }

        }

        abstract class Document : IAttachable
        {
            public int Size { get; set; }
            public string Type { get; set; }
        }

        class PDF : Document
        {
            public PDF(int size, string type)
            {
                this.Size = size;
                this.Type = type;
            }

        }

        class Text : Document
        {
            public Text(int size, string type)
            {
                this.Size = size;
                this.Type = type;
            }

        }

        class Image : IAttachable
        {
            public int Size { get; set; }
            public string Type { get; set; }

            public Image(int size, string type)
            {
                this.Size = size;
                this.Type = type;
            }

        }

        class Email
        {
            public List<IAttachable> Attached { get; set; }

            public Email()
            {
                this.Attached = new List<IAttachable>();
            }

            public void Send()
            {
                Console.WriteLine("Sends mail with the following items attached:");
                for (int i = 0; i < Attached.Count(); i++)
                {
                    Console.WriteLine(Attached[i].GetType().Name);
                }


            }

        }


    }
}
