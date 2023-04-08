import { HeroSection } from '@/components/templates/HeroSection';
import { Header } from '@/components/organisms/Header';
import { NextPage } from 'next';
import Head from 'next/head';
import { Card, Stack, Box, Heading, Text, StackDivider, CardBody, Spinner } from '@chakra-ui/react';
import { axiosApi } from '@/libs/axios';
import { useQuery } from 'react-query';
import { Loading } from '@/components/templates/Loading';

const Home: NextPage = () => {
  const { data, isLoading } = useQuery('shops', () => {
    const response = axiosApi.get('/api/v1/shops');
    return response;
  });

  if (isLoading) return <Loading />;
  const shops = data.data['data'];

  return (
    <>
      <Head>
        <title>イエケイタベタイ</title>
      </Head>
      <Header />
      <HeroSection />
      <Card>
        <CardBody>
          <Stack divider={<StackDivider />} spacing="4">
            {shops.map((shop, index) => (
              <Box key={index}>
                <Heading size="xs" textTransform="uppercase">
                  {shop.shop_name}
                </Heading>
                <Text pt="2" fontSize="sm">
                  {shop.prefecture}
                </Text>
              </Box>
            ))}
          </Stack>
        </CardBody>
      </Card>
    </>
  );
};

export default Home;
