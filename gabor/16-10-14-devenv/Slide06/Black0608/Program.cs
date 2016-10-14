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
            ElectricPhone myPhone = new ElectricPhone();
            myPhone.Ring();
            DigitalPhone myDigitalPhone = new DigitalPhone();
            myDigitalPhone.Ring();
            TalkingPhone myTalkingPhone = new TalkingPhone();
            myTalkingPhone.Ring();
        }
    }
}
