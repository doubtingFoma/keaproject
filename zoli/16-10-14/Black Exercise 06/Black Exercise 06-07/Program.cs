using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_06_07
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
            public virtual void Ring()
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
            public override void Ring()
            {
                Console.WriteLine("This is an electronic phone!");
            }
        }
    }
}
