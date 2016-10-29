using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    class Car : Vehicle
    {
        public void HonkHorn()
        {
            Console.WriteLine("Honk Honk");
        }

        public void Nitro()
        {
            Console.WriteLine($"Car's speed before Nitro: {this.Speed}");
            this.Speed += 15;
            Console.WriteLine($"Car's speed after Nitro: {this.Speed}");
        }
    }
}
