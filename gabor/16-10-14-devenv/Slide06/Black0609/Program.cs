using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    class Program
    {
        static void Main(string[] args)
        {
            
            DigitalPhone myDigitalPhone = new DigitalPhone();
            myDigitalPhone.Ring();
            myDigitalPhone.VoiceMail();

            DigitalCellPhone myDigitalCellPhone = new DigitalCellPhone();
            myDigitalCellPhone.Ring();
            myDigitalCellPhone.VoiceMail();
            
        }
    }
}
