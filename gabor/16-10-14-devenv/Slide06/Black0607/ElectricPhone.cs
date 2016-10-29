using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0607
{
    class ElectricPhone : Telephone
    {
        public ElectricPhone()
        {
            this.Phonetype = "Digital";
        }

        public override void Ring()
        {
            Console.WriteLine("Electric phone ringing....");
        }
    }
}
