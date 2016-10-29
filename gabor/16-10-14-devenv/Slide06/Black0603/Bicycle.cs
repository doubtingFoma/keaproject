using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    class Bicycle : Vehicle
    {
        public void RingBell()
        {
            Console.WriteLine("Ring Ring");
        }

        public override void Indicate(bool left)
        {
            string direction = left ? "left" : "right";
            Console.WriteLine($"Raising {direction} arm");
        }
    }
}
