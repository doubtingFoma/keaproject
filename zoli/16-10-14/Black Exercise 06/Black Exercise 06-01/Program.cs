using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_06_01
{
    class Program
    {
        static void Main(string[] args)
        {
            Car BMWX5 = new Car();
            BMWX5.Accelerate = 10;
            BMWX5.Decelerate = 12;
            BMWX5.Speed = 200;
            BMWX5.HonkHorn();

            Bicycle Gepida = new Bicycle();
            Gepida.RingBell();

            Console.ReadKey();
        }

        class Vehicle
        {
            public int Speed;
            public int Accelerate;
            public int Decelerate;
        }
        class Car : Vehicle
        {
            public void HonkHorn()
            {
                Console.WriteLine("Honk Honk");
            }
        }

        class Bicycle : Vehicle
        {
            public void RingBell()
            {
                Console.WriteLine("Ring Ring");
            }
        }
    }
}
