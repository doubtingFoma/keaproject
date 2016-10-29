using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    class Vehicle
    {
        protected int Speed { get; set; }

        // Constructor
        public Vehicle()
        {
            this.Speed = 0;
        }

        // Increase speed
        public void Accelerate(int amount)
        {
            this.Speed += amount;
        }

        // Decrease speed
        public void Decelerate(int amount)
        {
            this.Speed += amount;
        }
    }
}
