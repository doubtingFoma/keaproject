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

            // Set speed on Vehicle
            myCar.Accelerate(5);

            // Set speed on Car
            // Won't work if speed is private
            myCar.Nitro();

            // Set speed on Main
            // Won't work if Speed is protected or private
            // myCar.Speed = 5;


        }
    }
}
