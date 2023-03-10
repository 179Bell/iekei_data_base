import { HeroSection } from '@/components/templates/HeroSection';
import { Header } from '@/components/organisms/Header';
import { NextPage } from 'next';
import Head from 'next/head';

const Home: NextPage = () => {
  return (
    <>
      <Head>
        <title>イエケイタベタイ</title>
      </Head>
      <Header />
      <HeroSection />
    </>
  );
};

export default Home;
