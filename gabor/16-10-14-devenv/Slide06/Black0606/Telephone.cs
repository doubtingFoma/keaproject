using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    class Telephone
    {
        protected string Phonetype { get; set; }

        public void Ring()
        {
            Console.WriteLine($"Ringing {this.Phonetype}");
        }
    }
}
