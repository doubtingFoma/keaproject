using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0704
{
    class Fish : IPrey
    {
        public int FleeSpeed { get; set; }

        public Fish(int fleeSpeed)
        {
            this.FleeSpeed = fleeSpeed;
        }

        public void Flee()
        {
            Console.WriteLine($"{this.GetType().Name} escaped succesfully.");
        }
    }
}
