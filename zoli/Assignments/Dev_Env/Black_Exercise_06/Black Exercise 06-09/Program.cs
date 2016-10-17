using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_06_09
{
    class Program
    {
        static void Main(string[] args)
        {
            ElectronicPhone myElPhone = new ElectronicPhone();
            myElPhone.Ring();
            
            TalkingPhone myTalkingPhone = new TalkingPhone();
            myTalkingPhone.Ring();

            DigitalPhone myDigitalPhone = new DigitalPhone();
            myDigitalPhone.Ring();
            myDigitalPhone.VoiceMail();

            DigitalCellPhone myDigitalCell = new DigitalCellPhone();
            myDigitalCell.Ring();
            myDigitalCell.VoiceMail();


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
            public virtual void VoiceMail()
            {
                Console.WriteLine("You have a message. Press Play to retrieve.");
            }
        }

        public class DigitalCellPhone : DigitalPhone
        {
            public override void VoiceMail()
            {
                Console.WriteLine("You have a message. Call to retrieve");
            }
        }
    }
}
