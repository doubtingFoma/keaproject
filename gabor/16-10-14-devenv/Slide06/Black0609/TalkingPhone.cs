using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    class TalkingPhone : Telephone
    {
        public TalkingPhone()
        {
            this.Phonetype = "Talking Phone";
        }

        public override void Ring()
        {
            Console.WriteLine("Talking phone ringing...");
        }
    }
}
