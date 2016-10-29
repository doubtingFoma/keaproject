using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_06_06
{
    class Program
    {
        static void Main(string[] args)
        {
            ElectronicPhone myPhone = new ElectronicPhone();
            myPhone.Ring();

            Console.ReadKey();
        }

        public class Telephone
        {
            protected string phonetype;
            public void Ring()
            {
                Console.WriteLine($"Ringing the {phonetype} phone");
            }
        }

        public class ElectronicPhone : Telephone
        {
            public ElectronicPhone()
            {
                phonetype = "Digital";
            }
        }
    }
}
