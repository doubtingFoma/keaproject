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
            Car myCar = new Car();
            Bicycle myBike = new Bicycle();

            myCar.HonkHorn();
            myBike.RingBell();
        }
    }
}
