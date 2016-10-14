using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    class DigitalPhone : Telephone
    {
        public DigitalPhone()
        {
            this.Phonetype = "Digital Phone";
        }

        public override void Ring()
        {
            Console.WriteLine("Digital phone ringing...");
        }

        public virtual void VoiceMail()
        {
            Console.WriteLine("You have a message. Press Play to retrieve");
        }
    }
}
