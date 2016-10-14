using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    class DigitalCellPhone:DigitalPhone
    {
        public override void VoiceMail()
        {
            Console.WriteLine("You have a message. Call to retrieve");
        }
    }
}
