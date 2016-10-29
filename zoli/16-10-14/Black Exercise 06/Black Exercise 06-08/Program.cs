using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_06_08
{
    class Program
    {
        static void Main(string[] args)
        {
            ElectronicPhone myPhone = new ElectronicPhone();
            myPhone.Ring();

            Console.ReadKey();
        }

        public abstract class Telephone
        {
            protected string phonetype;
            public abstract void Ring();
        }

        public class ElectronicPhone : Telephone
        {
            public ElectronicPhone()
            {
                phonetype = "Electronic";
            }

            public override void Ring()
            {
                Console.WriteLine($"This is an {phonetype} phone!");
            }
        }

        public class TalkingPhone : Telephone
        {
            public TalkingPhone()
            {
                phonetype = "Talking";
            }            
            public override void Ring()
            {                
                Console.WriteLine($"This is a phone that is talking. Just like any other phone. But it's a {phonetype} Phone!");
            }
        }

        public class DigitalPhone : Telephone
        {
            public DigitalPhone()
            {
                phonetype = "Digital";
            }
            public override void Ring()
            {
                Console.WriteLine($"This is a {phonetype} Phone!");
            }
        }
    }
}
