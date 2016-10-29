using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0607
{
    class Telephone
    {
        protected string Phonetype { get; set; }

        public virtual void Ring()
        {
            Console.WriteLine($"Ringing {this.Phonetype}");
        }
    }
}
